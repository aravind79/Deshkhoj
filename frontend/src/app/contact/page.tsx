"use client";

import { motion } from "framer-motion";
import { Mail, Phone, MapPin } from "lucide-react";

export default function ContactPage() {
  return (
    <div className="container mx-auto px-4 py-20 md:px-6">
      <motion.div
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.5 }}
        className="max-w-4xl mx-auto"
      >
        <h1 className="text-4xl font-black tracking-tighter text-foreground sm:text-5xl mb-8">
          Contact <span className="text-primary">Us</span>
        </h1>
        <p className="text-lg text-foreground/70 mb-12">
          Have questions or need help? We're here for you. Reach out to us through any of the channels below.
        </p>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div className="bg-white p-8 rounded-2xl border border-card-border shadow-sm flex flex-col items-center text-center">
            <div className="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
              <Mail className="h-6 w-6" />
            </div>
            <h3 className="font-bold text-lg mb-2">Email</h3>
            <p className="text-sm text-foreground/70">support@deshkhoj.com</p>
          </div>

          <div className="bg-white p-8 rounded-2xl border border-card-border shadow-sm flex flex-col items-center text-center">
            <div className="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
              <Phone className="h-6 w-6" />
            </div>
            <h3 className="font-bold text-lg mb-2">Phone</h3>
            <p className="text-sm text-foreground/70">+91 99999 99999</p>
          </div>

          <div className="bg-white p-8 rounded-2xl border border-card-border shadow-sm flex flex-col items-center text-center">
            <div className="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-4">
              <MapPin className="h-6 w-6" />
            </div>
            <h3 className="font-bold text-lg mb-2">Office</h3>
            <p className="text-sm text-foreground/70 text-center">Varanasi, Uttar Pradesh, India</p>
          </div>
        </div>

        <div className="mt-16 bg-white p-10 rounded-[2.5rem] border border-card-border shadow-sm">
          <h2 className="text-2xl font-bold mb-6">Send us a Message</h2>
          <form className="space-y-4">
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div className="flex flex-col gap-2">
                <label className="text-sm font-medium">Name</label>
                <input type="text" className="rounded-xl border border-card-border p-3 focus:outline-primary" placeholder="Your Name" />
              </div>
              <div className="flex flex-col gap-2">
                <label className="text-sm font-medium">Email</label>
                <input type="email" className="rounded-xl border border-card-border p-3 focus:outline-primary" placeholder="Your Email" />
              </div>
            </div>
            <div className="flex flex-col gap-2">
              <label className="text-sm font-medium">Message</label>
              <textarea className="rounded-xl border border-card-border p-3 focus:outline-primary min-h-[150px]" placeholder="How can we help?"></textarea>
            </div>
            <button className="w-full rounded-full bg-primary py-4 font-black text-white hover:bg-primary-hover transition">
              Send Message
            </button>
          </form>
        </div>
      </motion.div>
    </div>
  );
}
