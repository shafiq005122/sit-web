'use client';

import { MessageCircle, Phone, Package } from 'lucide-react';

export default function Hero() {
  return (
    <section
      id="home"
      className="relative min-h-screen flex items-center justify-center overflow-hidden noise"
    >
      {/* Background image with overlay */}
      <div className="absolute inset-0 z-0">
        <img
          src="/images/makkah.webp"
          alt="Makkah"
          className="w-full h-full object-cover"
        />
        <div className="absolute inset-0 bg-gradient-to-b from-[#1a3d1a]/85 via-[#1a3d1a]/70 to-[#0f2a0f]" />
        <div className="absolute inset-0 bg-gradient-to-r from-[#1a3d1a]/80 via-transparent to-[#1a3d1a]/40" />
      </div>

      {/* Floating orbs */}
      <div className="absolute top-1/4 left-10 w-72 h-72 rounded-full bg-[#c9a84c]/15 blur-3xl animate-orb" />
      <div className="absolute bottom-1/4 right-10 w-96 h-96 rounded-full bg-[#c9a84c]/10 blur-3xl animate-orb delay-300" />

      {/* Content */}
      <div className="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 text-center pt-28 pb-16">
        <div className="inline-flex items-center gap-2 px-4 py-1.5 rounded-full glass-gold mb-8 animate-fadeInUp">
          <span className="w-2 h-2 rounded-full bg-[#e8c97a] animate-pulse-gold" />
          <span className="text-xs sm:text-sm text-[#e8c97a] tracking-wider uppercase">
            Trusted Umrah Travel Partner
          </span>
        </div>

        <h1 className="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6 animate-fadeInUp delay-100">
          <span className="text-white">Affordable &amp; Reliable</span>
          <br />
          <span className="gradient-text-gold">Umrah Packages</span>
          <br />
          <span className="text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl">
            from Pakistan
          </span>
        </h1>

        <p className="max-w-2xl mx-auto text-base sm:text-lg text-[#f5efe0]/85 leading-relaxed mb-10 animate-fadeInUp delay-200">
          Perform your sacred journey with peace, comfort, and confidence.
          Siddique Ibrahim Travel &amp; Tours provides complete Umrah travel
          services — visa assistance, airline tickets, hotel accommodation in
          Makkah and Madinah, transport, and Ziyarah support.
        </p>

        <div className="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fadeInUp delay-300">
          <a
            href="#packages"
            className="flex items-center gap-2 px-7 py-3.5 rounded-full btn-gold w-full sm:w-auto justify-center"
          >
            <Package size={18} />
            View Packages
          </a>
          <a
            href="https://wa.me/923000000000"
            target="_blank"
            rel="noopener noreferrer"
            className="flex items-center gap-2 px-7 py-3.5 rounded-full btn-whatsapp w-full sm:w-auto justify-center"
          >
            <MessageCircle size={18} />
            WhatsApp Now
          </a>
          <a
            href="tel:+923000000000"
            className="flex items-center gap-2 px-7 py-3.5 rounded-full btn-outline-gold w-full sm:w-auto justify-center"
            style={{ color: '#e8c97a', borderColor: '#c9a84c' }}
          >
            <Phone size={18} />
            Call for Booking
          </a>
        </div>

        {/* Stats */}
        <div className="grid grid-cols-3 gap-4 sm:gap-8 max-w-2xl mx-auto mt-16 animate-fadeInUp delay-500">
          {[
            { value: '100%', label: 'Visa Assistance' },
            { value: '24/7', label: 'Customer Support' },
            { value: 'Makkah & Madinah', label: 'Hotel Options' },
          ].map((stat) => (
            <div key={stat.label} className="glass rounded-2xl py-5 px-2 sm:px-4 card-hover">
              <div className="text-xl sm:text-2xl md:text-3xl font-bold gradient-text-gold">
                {stat.value}
              </div>
              <div className="text-[10px] sm:text-xs text-[#1a3d1a]/60 mt-1 leading-tight">
                {stat.label}
              </div>
            </div>
          ))}
        </div>
      </div>

      {/* Scroll indicator */}
      <div className="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 animate-float">
        <div className="w-6 h-10 rounded-full border-2 border-[#c9a84c]/50 flex items-start justify-center p-1.5">
          <div className="w-1 h-2 rounded-full bg-[#e8c97a] animate-pulse" />
        </div>
      </div>
    </section>
  );
}
