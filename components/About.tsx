import { Heart, Users, MapPin } from 'lucide-react';

export default function About() {
  return (
    <section id="about" className="relative py-24 sm:py-32 overflow-hidden">
      <div className="absolute top-0 left-1/4 w-80 h-80 rounded-full bg-[#c9a84c]/12 blur-3xl" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
        <div className="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
          {/* Image side */}
          <div className="relative reveal">
            <div className="relative rounded-3xl overflow-hidden emerald-glow ring-2 ring-[#c9a84c]/30">
              <img
                src="/images/medinah.webp"
                alt="Madinah"
                className="w-full h-[420px] sm:h-[520px] object-cover"
              />
              <div className="absolute inset-0 bg-gradient-to-t from-[#1a3d1a]/60 via-transparent to-transparent" />
            </div>

            {/* Floating glass card */}
            <div className="absolute -bottom-6 -right-4 sm:-right-8 glass-gold rounded-2xl p-5 max-w-[240px] animate-float">
              <div className="flex items-center gap-3 mb-2">
                <div className="w-10 h-10 rounded-full gradient-gold flex items-center justify-center">
                  <Heart size={18} className="text-[#1a3d1a]" />
                </div>
                <div className="text-[#a07830] font-semibold text-sm">
                  Guests of Allah
                </div>
              </div>
              <p className="text-xs text-[#1a3d1a]/70 leading-relaxed">
                Serving pilgrims with care, honesty, and professional travel
                arrangements.
              </p>
            </div>
          </div>

          {/* Text side */}
          <div className="reveal">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full glass-emerald mb-5">
              <span className="text-xs text-[#2d5a2d] tracking-wider uppercase">
                About Our Services
              </span>
            </div>

            <h2 className="text-3xl sm:text-4xl md:text-5xl font-bold text-[#1a3d1a] mb-6 leading-tight">
              A Sacred Journey,
              <br />
              <span className="gradient-text-gold">Handled with Care</span>
            </h2>

            <p className="text-[#1a3d1a]/75 leading-relaxed mb-5">
              Siddique Ibrahim Travel &amp; Tours is committed to serving the
              guests of Allah with care, honesty, and professional travel
              arrangements. Whether you are travelling alone, with family, or in
              a group, our team helps you choose the right Umrah package
              according to your budget, travel dates, and hotel preference.
            </p>

            <p className="text-[#1a3d1a]/75 leading-relaxed mb-8">
              We arrange everything needed for a smooth Umrah journey so you can
              focus on your ibadah.
            </p>

            <div className="grid sm:grid-cols-2 gap-4">
              {[
                { icon: Users, title: 'Family & Group', text: 'Tailored packages for every group size' },
                { icon: MapPin, title: 'Makkah & Madinah', text: 'Premium hotel accommodations' },
              ].map((item) => (
                <div key={item.title} className="glass rounded-2xl p-5 card-hover">
                  <item.icon size={22} className="text-[#a07830] mb-3" />
                  <div className="text-[#1a3d1a] font-semibold text-sm mb-1">
                    {item.title}
                  </div>
                  <div className="text-xs text-[#1a3d1a]/60">{item.text}</div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
