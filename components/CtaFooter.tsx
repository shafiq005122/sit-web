import { MessageCircle, Phone, Package, MapPin, Mail } from 'lucide-react';

export default function CtaFooter() {
  return (
    <footer className="relative overflow-hidden">
      {/* Final CTA */}
      <section className="relative py-24 sm:py-32">
        <div className="absolute inset-0 z-0">
          <img
            src="/images/makkah.webp"
            alt="Makkah"
            className="w-full h-full object-cover opacity-25"
          />
          <div className="absolute inset-0 bg-gradient-to-b from-[#1a3d1a]/90 via-[#1a3d1a]/75 to-[#0f2a0f]" />
        </div>

        <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full bg-[#c9a84c]/10 blur-3xl" />

        <div className="relative z-10 max-w-3xl mx-auto px-4 sm:px-6 text-center reveal">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full glass-gold mb-6">
            <span className="text-xs text-[#e8c97a] tracking-wider uppercase">
              Begin Your Journey
            </span>
          </div>

          <h2 className="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
            Ready to Book Your
            <br />
            <span className="gradient-text-gold">Umrah Package?</span>
          </h2>

          <p className="max-w-xl mx-auto text-[#f0ede6]/75 mb-10 leading-relaxed">
            Contact Siddique Ibrahim Travel &amp; Tours today and let our team
            help you plan a comfortable and peaceful Umrah journey.
          </p>

          <div className="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a
              href="https://wa.me/923000000000"
              target="_blank"
              rel="noopener noreferrer"
              className="flex items-center gap-2 px-7 py-3.5 rounded-full btn-whatsapp w-full sm:w-auto justify-center"
            >
              <MessageCircle size={18} />
              WhatsApp Support
            </a>
            <a
              href="tel:+923000000000"
              className="flex items-center gap-2 px-7 py-3.5 rounded-full btn-gold w-full sm:w-auto justify-center"
            >
              <Phone size={18} />
              Call Now
            </a>
            <a
              href="#packages"
              className="flex items-center gap-2 px-7 py-3.5 rounded-full btn-outline-gold w-full sm:w-auto justify-center"
              style={{ color: '#e8c97a', borderColor: '#c9a84c' }}
            >
              <Package size={18} />
              View Packages
            </a>
          </div>
        </div>
      </section>

      {/* Footer */}
      <div className="relative bg-[#1a3d1a] border-t border-[#c9a84c]/20">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 py-14">
          <div className="grid md:grid-cols-3 gap-10">
            {/* Brand */}
            <div>
              <div className="flex items-center gap-3 mb-4">
                <div className="w-12 h-12 rounded-full overflow-hidden ring-2 ring-[#c9a84c]/40">
                  <img src="/images/logo.png" alt="Logo" className="w-full h-full object-cover" />
                </div>
                <div>
                  <div className="font-semibold text-[#e8c97a] uppercase text-sm tracking-wide">
                    Siddique Ibrahim
                  </div>
                  <div className="text-[10px] text-[#c9a84c]/70 tracking-[0.2em] uppercase">
                    Travel & Tours
                  </div>
                </div>
              </div>
              <p className="text-sm text-[#f0ede6]/55 leading-relaxed max-w-xs">
                Serving the guests of Allah with care, honesty, and professional
                travel arrangements for Umrah.
              </p>
            </div>

            {/* Quick links */}
            <div>
              <h4 className="text-white font-semibold text-sm mb-4 uppercase tracking-wider">
                Quick Links
              </h4>
              <div className="flex flex-col gap-2.5">
                {[
                  { href: '#about', label: 'About Us' },
                  { href: '#services', label: 'Our Services' },
                  { href: '#packages', label: 'Umrah Packages' },
                  { href: '#process', label: 'Booking Process' },
                  { href: '#faq', label: 'FAQ' },
                ].map((link) => (
                  <a
                    key={link.href}
                    href={link.href}
                    className="text-sm text-[#f0ede6]/55 hover:text-[#e8c97a] transition-colors"
                  >
                    {link.label}
                  </a>
                ))}
              </div>
            </div>

            {/* Contact */}
            <div>
              <h4 className="text-white font-semibold text-sm mb-4 uppercase tracking-wider">
                Contact
              </h4>
              <div className="flex flex-col gap-3">
                <a href="tel:+923000000000" className="flex items-center gap-3 text-sm text-[#f0ede6]/55 hover:text-[#e8c97a] transition-colors">
                  <Phone size={16} className="text-[#c9a84c]" />
                  +92 300 000 0000
                </a>
                <a href="https://wa.me/923000000000" target="_blank" rel="noopener noreferrer" className="flex items-center gap-3 text-sm text-[#f0ede6]/55 hover:text-[#e8c97a] transition-colors">
                  <MessageCircle size={16} className="text-[#c9a84c]" />
                  WhatsApp Us
                </a>
                <div className="flex items-center gap-3 text-sm text-[#f0ede6]/55">
                  <Mail size={16} className="text-[#c9a84c]" />
                  info@siddiqueibrahim.com
                </div>
                <div className="flex items-center gap-3 text-sm text-[#f0ede6]/55">
                  <MapPin size={16} className="text-[#c9a84c]" />
                  Karachi, Pakistan
                </div>
              </div>
            </div>
          </div>

          <div className="divider-gold my-8" />

          <div className="flex flex-col sm:flex-row items-center justify-between gap-3">
            <p className="text-xs text-[#f0ede6]/40">
              © {new Date().getFullYear()} Siddique Ibrahim Travel &amp; Tours. All rights reserved.
            </p>
            <p className="text-xs text-[#f0ede6]/40">
              Umrah Packages from Pakistan
            </p>
          </div>
        </div>
      </div>
    </footer>
  );
}
