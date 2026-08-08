'use client';

import { useState, useEffect } from 'react';
import { Menu, X, Phone } from 'lucide-react';

const links = [
  { href: '#home', label: 'Home' },
  { href: '#about', label: 'About' },
  { href: '#services', label: 'Services' },
  { href: '#packages', label: 'Packages' },
  { href: '#process', label: 'Booking' },
  { href: '#faq', label: 'FAQ' },
];

export default function Navbar() {
  const [scrolled, setScrolled] = useState(false);
  const [open, setOpen] = useState(false);

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 40);
    window.addEventListener('scroll', onScroll);
    return () => window.removeEventListener('scroll', onScroll);
  }, []);

  return (
    <nav
      className={`fixed top-0 left-0 right-0 z-50 transition-all duration-500 ${
        scrolled
          ? 'bg-[#1a3d1a]/95 backdrop-blur-xl py-3 shadow-xl shadow-black/20 border-b border-[#c9a84c]/30'
          : 'bg-transparent py-5'
      }`}
    >
      <div className="max-w-7xl mx-auto px-4 sm:px-6 flex items-center justify-between">
        {/* Logo */}
        <a href="#home" className="flex items-center gap-3 group">
          <div className="relative w-11 h-11 rounded-full overflow-hidden ring-2 ring-[#c9a84c]/50 group-hover:ring-[#c9a84c] transition-all">
            <img
              src="/images/logo.png"
              alt="Siddique Ibrahim Travel & Tours logo"
              className="w-full h-full object-cover"
            />
          </div>
          <div className="hidden sm:block leading-tight">
            <div className={`font-semibold tracking-wide text-sm uppercase transition-colors ${scrolled ? 'text-[#e8c97a]' : 'text-[#a07830]'}`}>
              Siddique Ibrahim
            </div>
            <div className={`text-[10px] tracking-[0.2em] uppercase transition-colors ${scrolled ? 'text-[#c9a84c]/80' : 'text-[#c9a84c]'}`}>
              Travel & Tours
            </div>
          </div>
        </a>

        {/* Desktop links */}
        <div className="hidden lg:flex items-center gap-8">
          {links.map((link) => (
            <a
              key={link.href}
              href={link.href}
              className={`text-sm transition-colors relative group ${
                scrolled ? 'text-[#f5efe0]/80 hover:text-[#e8c97a]' : 'text-[#1a3d1a]/80 hover:text-[#a07830]'
              }`}
            >
              {link.label}
              <span className="absolute -bottom-1 left-0 w-0 h-px bg-[#c9a84c] transition-all group-hover:w-full" />
            </a>
          ))}
        </div>

        {/* CTA */}
        <div className="hidden lg:flex items-center gap-3">
          <a
            href="tel:+923000000000"
            className="flex items-center gap-2 px-4 py-2 rounded-full text-sm btn-outline-gold"
          >
            <Phone size={15} />
            Call Now
          </a>
          <a
            href="#packages"
            className="px-5 py-2 rounded-full text-sm btn-gold"
          >
            View Packages
          </a>
        </div>

        {/* Mobile toggle */}
        <button
          onClick={() => setOpen(!open)}
          className={`lg:hidden p-2 transition-colors ${scrolled ? 'text-[#e8c97a]' : 'text-[#1a3d1a]'}`}
          aria-label="Toggle menu"
        >
          {open ? <X size={24} /> : <Menu size={24} />}
        </button>
      </div>

      {/* Mobile menu */}
      {open && (
        <div className="lg:hidden glass-dark mt-3 mx-4 rounded-2xl p-6 animate-fadeInUp">
          <div className="flex flex-col gap-4">
            {links.map((link) => (
              <a
                key={link.href}
                href={link.href}
                onClick={() => setOpen(false)}
                className="text-[#f5efe0]/80 hover:text-[#e8c97a] transition-colors py-1"
              >
                {link.label}
              </a>
            ))}
            <div className="flex gap-3 mt-2">
              <a href="tel:+923000000000" className="flex-1 px-4 py-2.5 rounded-full text-sm btn-outline-gold text-center" style={{ color: '#e8c97a', borderColor: '#c9a84c' }}>
                Call Now
              </a>
              <a href="#packages" onClick={() => setOpen(false)} className="flex-1 px-4 py-2.5 rounded-full text-sm btn-gold text-center">
                View Packages
              </a>
            </div>
          </div>
        </div>
      )}
    </nav>
  );
}
