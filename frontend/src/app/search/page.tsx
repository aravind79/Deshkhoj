"use client";

import { useSearchParams, useRouter } from "next/navigation";
import { Suspense, useEffect, useState, useRef } from "react";
import { MapPin, Star, Phone, Search, CheckCircle2 } from "lucide-react";
import { api, API_BASE, type Business } from "@/lib/api";
import InquiryModal from "@/components/InquiryModal";

function SearchResults() {
  const searchParams = useSearchParams();
  const router = useRouter();

  // Read ALL params live from searchParams — never store in useState
  // This way there are no stale closures when navigating between categories
  const q_url = searchParams.get("q") || "";
  const loc_url = searchParams.get("loc") || "";
  const cat_url = searchParams.get("category") || "";

  const [q, setQ] = useState(q_url);
  const [loc, setLoc] = useState(loc_url);
  const [results, setResults] = useState<Business[]>([]);
  const [meta, setMeta] = useState({ total: 0, page: 1, totalPages: 1 });
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);
  const [page, setPage] = useState(1);
  const [inquiryShop, setInquiryShop] = useState<Business | null>(null);
  const resultsRef = useRef<HTMLHeadingElement>(null);

  // Single fetch function — reads live from searchParams, no stale closures
  const doFetch = async (opts: { q: string; loc: string; category: string; page: number }) => {
    setLoading(true);
    setError(null);
    try {
      const res = await api.businesses.search({
        q: opts.q,
        loc: opts.loc,
        category: opts.category,
        page: opts.page,
        limit: 12,
      });
      setResults(res.data);
      setMeta(res.meta);
    } catch (err: any) {
      console.error("Search API Error:", err);
      setError(err?.response?.data?.message || err.message || "Failed to fetch results");
      setResults([]);
    } finally {
      setLoading(false);
      setTimeout(() => {
        resultsRef.current?.scrollIntoView({ behavior: "smooth", block: "start" });
      }, 100);
    }
  };

  // Update URL when user types — this clears stale ?category= and keeps URL in sync.
  // The KeyedSearchResults wrapper remounts SearchResults on every URL change.
  const updateUrl = (newQ: string, newLoc: string) => {
    const params = new URLSearchParams();
    if (newQ.trim()) params.set("q", newQ.trim());
    if (newLoc.trim()) params.set("loc", newLoc.trim());
    // Note: intentionally do NOT set category — typing always clears the old category filter
    const qs = params.toString();
    router.replace(qs ? `/search?${qs}` : "/search", { scroll: false });
  };

  // Re-fetch whenever the URL parameters change (debounced)
  useEffect(() => {
    const timer = setTimeout(() => {
      setPage(1);
      doFetch({ q, loc, category: cat_url, page: 1 });
    }, 300);
    return () => clearTimeout(timer);
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [q, loc, cat_url]);

  // Debounce URL updates when user types (separate timer so fetch and URL update stay in sync)
  const urlTimerRef = useRef<ReturnType<typeof setTimeout> | null>(null);
  const handleQChange = (val: string) => {
    setQ(val);
    if (urlTimerRef.current) clearTimeout(urlTimerRef.current);
    urlTimerRef.current = setTimeout(() => updateUrl(val, loc), 400);
  };
  const handleLocChange = (val: string) => {
    setLoc(val);
    if (urlTimerRef.current) clearTimeout(urlTimerRef.current);
    urlTimerRef.current = setTimeout(() => updateUrl(q, val), 400);
  };

  const isFiltered = q.length > 0 || loc.length > 0 || !!cat_url;
  const headingText = cat_url
    ? `Results for ${cat_url}`
    : q
    ? `Results for "${q}"`
    : "Explore Businesses";

  return (
    <div className="container mx-auto px-4 py-8 md:px-6">

      {/* Search Bar */}
      <div className="mb-8 flex flex-col gap-4 md:flex-row">
        <div className="flex w-full items-center gap-2 rounded-full border border-card-border bg-card-bg shadow-sm px-4 py-3 focus-within:ring-2 focus-within:ring-primary md:w-auto md:min-w-[240px]">
          <MapPin className="h-4 w-4 text-primary flex-shrink-0" />
          <input
            value={loc}
            onChange={(e) => handleLocChange(e.target.value)}
            type="text"
            placeholder="Enter location..."
            className="w-full bg-transparent text-sm outline-none placeholder:text-foreground/40"
          />
        </div>
        <div className="flex w-full flex-1 items-center gap-2 rounded-full border border-card-border bg-card-bg shadow-sm px-4 py-3 focus-within:ring-2 focus-within:ring-primary">
          <Search className="h-4 w-4 text-foreground/40 flex-shrink-0" />
          <input
            value={q}
            onChange={(e) => handleQChange(e.target.value)}
            type="text"
            placeholder="What are you looking for?"
            className="w-full bg-transparent text-sm outline-none placeholder:text-foreground/40"
          />
        </div>
      </div>

      {/* Heading + count */}
      <div className="mb-8">
        <h1 ref={resultsRef} className="text-3xl font-black text-foreground scroll-mt-20">
          {headingText}
        </h1>
        {isFiltered && (
          <p className="text-foreground/40 font-bold mt-1 uppercase tracking-widest text-[10px]">
            {loading ? "Searching..." : `${meta.total} results found`}
          </p>
        )}
      </div>

      {/* Results — full width, no sidebar */}
      <div className="flex flex-col gap-4">
        {loading ? (
          Array.from({ length: 4 }).map((_, i) => (
            <div key={i} className="animate-pulse h-36 rounded-xl bg-card-border/40" />
          ))
        ) : results.length > 0 ? (
          <>
            {results.map((biz) => (
              <div
                key={biz.id}
                onClick={() => router.push(`/business/${biz.id}`)}
                className="group cursor-pointer relative flex flex-col sm:flex-row gap-6 rounded-2xl border border-card-border bg-card-bg p-5 shadow-sm hover:shadow-xl transition-all duration-300"
              >
                {/* Left: Image / Initial */}
                <div className="h-44 w-full sm:w-56 flex-shrink-0 rounded-xl bg-card-border/30 overflow-hidden relative">
                  <div className="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-primary/10 to-accent/10 group-hover:scale-105 transition-transform duration-500">
                    {biz.main_photo ? (
                      <img src={`${API_BASE}/uploads/${biz.main_photo}`} alt={biz.dukaan_name} className="h-full w-full object-cover" />
                    ) : (
                      <span className="text-4xl font-black text-primary/20">{biz.dukaan_name.charAt(0).toUpperCase()}</span>
                    )}
                  </div>
                  {biz.paid === 1 && (
                    <div className="absolute top-2 left-2 flex items-center gap-1 rounded-full bg-blue-600 px-2 py-1 text-[10px] font-bold text-white shadow-lg">
                      <CheckCircle2 className="h-3 w-3" /> VERIFIED
                    </div>
                  )}
                </div>

                {/* Right: Content */}
                <div className="flex flex-1 flex-col">
                  <div className="flex flex-col md:flex-row md:items-start justify-between gap-4">
                    <div className="space-y-1">
                      <h2 className="text-2xl font-bold text-foreground leading-tight group-hover:text-primary transition-colors">
                        {biz.dukaan_name}
                      </h2>
                      <div className="flex items-center gap-3 text-sm">
                        <div className="flex items-center gap-1 rounded bg-green-600 px-1.5 py-0.5 font-bold text-white">
                          {Number(biz.avg_rating || 0).toFixed(1)} <Star className="h-3 w-3 fill-current" />
                        </div>
                        <span className="text-foreground/40 font-medium">{biz.review_count || 0} Ratings</span>
                        <span className="h-1 w-1 rounded-full bg-foreground/20" />
                        <span className="text-foreground/40 font-medium italic">{(biz as any).years_established || 0} Years in business</span>
                      </div>
                      <p className="font-semibold text-primary/80">Ask for Price</p>
                    </div>

                    <div className="hidden lg:block">
                      <div className="flex flex-col items-end gap-1">
                        <div className="flex items-center gap-1.5 text-xs font-bold text-foreground/40 uppercase tracking-wider">
                          <MapPin className="h-3 w-3" /> {biz.dukaan_addr?.split(',').pop()?.trim() || 'Local'}
                        </div>
                        <span className="rounded-full bg-accent/10 px-3 py-1 text-[10px] font-bold text-accent uppercase tracking-widest">Dealer</span>
                      </div>
                    </div>
                  </div>

                  <div className="mt-4 flex items-center gap-4 text-sm text-foreground/70">
                    <div className="flex h-8 w-8 items-center justify-center rounded-full bg-card-border/40 text-primary">
                      <MapPin className="h-4 w-4" />
                    </div>
                    <span className="line-clamp-1 flex-1 font-medium">{biz.dukaan_addr}</span>
                    <button
                      onClick={(e) => { e.stopPropagation(); router.push(`/business/${biz.id}`); }}
                      className="text-primary font-bold text-xs hover:underline"
                    >
                      View More ▾
                    </button>
                  </div>

                  {/* Actions */}
                  <div className="mt-8 flex flex-wrap items-center gap-3" onClick={e => e.stopPropagation()}>
                    <button
                      onClick={() => setInquiryShop(biz)}
                      className="flex h-12 flex-1 min-w-[160px] items-center justify-center gap-2 rounded-xl bg-primary px-6 font-bold text-white shadow-md hover:bg-primary-hover transition-all active:scale-95 text-sm uppercase tracking-widest"
                    >
                      <Phone className="h-4 w-4" />
                      Get Best Price
                    </button>
                    <a
                      href={`https://wa.me/${biz.whatsapp || biz.contact_no}`}
                      target="_blank"
                      rel="noopener noreferrer"
                      className="flex h-12 flex-1 min-w-[160px] items-center justify-center gap-2 rounded-xl border border-green-600/30 bg-green-50 px-6 font-black text-green-600 hover:bg-green-100 transition-all active:scale-95 text-xs uppercase tracking-widest"
                    >
                      <svg className="h-6 w-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                      </svg>
                      WhatsApp
                    </a>
                  </div>
                </div>
              </div>
            ))}

            {meta.totalPages > 1 && (
              <div className="flex items-center justify-center gap-2 mt-4">
                <button
                  disabled={page === 1}
                  onClick={() => { const p = page - 1; setPage(p); doFetch({ q, loc, category: cat_url, page: p }); }}
                  className="rounded-md border border-card-border px-4 py-2 text-sm font-medium disabled:opacity-40 hover:bg-card-border/50 transition"
                >
                  ← Prev
                </button>
                <span className="text-sm text-foreground/60">Page {meta.page} of {meta.totalPages}</span>
                <button
                  disabled={page >= meta.totalPages}
                  onClick={() => { const p = page + 1; setPage(p); doFetch({ q, loc, category: cat_url, page: p }); }}
                  className="rounded-md border border-card-border px-4 py-2 text-sm font-medium disabled:opacity-40 hover:bg-card-border/50 transition"
                >
                  Next →
                </button>
              </div>
            )}
          </>
        ) : error ? (
          <div className="flex min-h-[300px] flex-col items-center justify-center rounded-xl border border-dashed border-red-500/50 bg-red-50 p-8 text-center">
            <h3 className="text-lg font-bold text-red-600">Backend API Error</h3>
            <p className="mt-2 text-red-500 max-w-sm text-sm">{error}</p>
            <p className="mt-4 text-xs font-bold text-red-400">If you see this, the SQL query likely crashed on the server.</p>
          </div>
        ) : (
          <div className="flex min-h-[300px] flex-col items-center justify-center rounded-xl border border-dashed border-card-border bg-card-bg/50 p-8 text-center">
            <MapPin className="h-12 w-12 text-foreground/20 mb-4" />
            <h3 className="text-lg font-bold text-foreground">No results found</h3>
            <p className="mt-2 text-foreground/60 max-w-sm text-sm">Try a different search term or location.</p>
          </div>
        )}
      </div>

      <InquiryModal
        isOpen={!!inquiryShop}
        onClose={() => setInquiryShop(null)}
        shopId={inquiryShop?.id || 0}
        initialData={{ category: inquiryShop?.shop_categories }}
      />
    </div>
  );
}

// Inner keyed component: forces a full remount when URL search string changes
function KeyedSearchResults() {
  const searchParams = useSearchParams();
  // Build a stable key from all URL params — component remounts on every unique URL
  const key = searchParams.toString();
  return <SearchResults key={key} />;
}

export default function SearchPage() {
  return (
    <Suspense fallback={<div className="flex min-h-[60vh] items-center justify-center"><div className="animate-spin rounded-full h-10 w-10 border-b-2 border-primary" /></div>}>
      <KeyedSearchResults />
    </Suspense>
  );
}
