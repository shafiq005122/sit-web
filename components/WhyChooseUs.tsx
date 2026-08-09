import { ShieldCheck, Package, HandHeart, Users, Eye, Headphones, Building2 } from 'lucide-react';

const reasons = [
  { icon: ShieldCheck, title: 'Trusted Hajj & Umrah Services', desc: 'Years of experience serving pilgrims with integrity.' },
  { icon: Package, title: 'Complete Package Arrangements', desc: 'Visa, ticket, hotel, transport — all in one place.' },
  { icon: HandHeart, title: 'Support for First-Time Pilgrims', desc: 'Guidance at every step for new travellers.' },
  { icon: Users, title: 'Family & Group Options', desc: 'Packages tailored to every group size.' },
  { icon: Eye, title: 'Clear Package Details', desc: 'No hidden costs — everything upfront.' },
  { icon: Headphones, title: 'Friendly Customer Support', desc: 'Responsive help via WhatsApp and phone.' },
  { icon: Building2, title: 'Makkah & Madinah Hotels', desc: 'A range of hotel categories to choose from.' },
];

export default function WhyChooseUs() {
  return (
    <section id="why" className="relative py-24 sm:py-32">
      {/* Dark green band for contrast */}
      <div className="absolute inset-0 bg-gradient-to-b from-transparent via-[#1a3d1a]/8 to-transparent" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
        <div className="text-center mb-14 reveal">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full glass-emerald mb-5">
            <span className="text-xs text-[#2d5a2d] tracking-wider uppercase">
              Why Choose Us
            </span>
          </div>
          <h2 className="text-3xl sm:text-4xl md:text-5xl font-bold text-[#1a3d1a] mb-4">
            The <span className="gradient-text-gold">Siddique Ibrahim</span> Difference
          </h2>
        </div>

        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
          {reasons.map((reason, i) => (
            <div
              key={reason.title}
              className="glass rounded-2xl p-6 card-hover reveal group flex items-start gap-4"
              style={{ transitionDelay: `${i * 60}ms` }}
            >
              <div className="w-12 h-12 rounded-xl glass-gold flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                <reason.icon size={22} className="text-[#a07830]" />
              </div>
              <div>
                <h3 className="text-[#1a3d1a] font-semibold text-base mb-1.5">
                  {reason.title}
                </h3>
                <p className="text-xs text-[#1a3d1a]/60 leading-relaxed">
                  {reason.desc}
                </p>
              </div>
            </div>
          ))}

          {/* CTA card */}
          <div className="glass-gold rounded-2xl p-6 card-hover reveal flex flex-col justify-center items-center text-center">
            <h3 className="text-[#1a3d1a] font-bold text-lg mb-2">
              Ready to begin?
            </h3>
            <p className="text-xs text-[#1a3d1a]/70 mb-4">
              Talk to our team today.
            </p>
            <a href="#packages" className="px-5 py-2.5 rounded-full btn-gold text-sm">
              View Packages
            </a>
          </div>
        </div>
      </div>
    </section>
  );
}
