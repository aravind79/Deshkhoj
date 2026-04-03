import Link from 'next/link';
import Image from 'next/image';

export default function Footer() {
  return (
    <footer className="mt-12 border-t border-card-border bg-card-bg pt-10 pb-6">
      <div className="container mx-auto px-4 md:px-6">
        <div className="grid grid-cols-1 gap-8 md:grid-cols-4">
          <div className="space-y-4">
            <Link href="/" className="flex items-center gap-2">
              <Image src="/logo.jpg" alt="DeshKhoj Logo" width={180} height={40} className="h-10 w-auto object-contain" />
            </Link>
            <p className="text-sm text-foreground/70">
              India's premier local search engine. Find businesses, services, and products near you instantly.
            </p>
          </div>
          <div>
            <h3 className="mb-4 text-lg font-semibold text-foreground">Quick Links</h3>
            <ul className="space-y-2 text-sm text-foreground/70">
              <li><Link href="/" className="hover:text-primary transition">About Us</Link></li>
              <li><Link href="/" className="hover:text-primary transition">Contact Us</Link></li>
              <li><Link href="/" className="hover:text-primary transition">Add Business</Link></li>
            </ul>
          </div>
          <div>
            <h3 className="mb-4 text-lg font-semibold text-foreground">Support</h3>
            <ul className="space-y-2 text-sm text-foreground/70">
              <li><Link href="/" className="hover:text-primary transition">Privacy Policy</Link></li>
              <li><Link href="/" className="hover:text-primary transition">Terms of Service</Link></li>
            </ul>
          </div>
        </div>
        <div className="mt-8 flex items-center justify-center border-t border-card-border pt-6 text-sm text-foreground/50">
          © {new Date().getFullYear()} DeshKhoj. All rights reserved.
        </div>
      </div>
    </footer>
  );
}
