import {
  Plane,
  Hotel,
  Car,
  Map,
  FileCheck,
  Users,
  MessageCircle,
  Phone,
} from 'lucide-react';

const services = [
  { icon: FileCheck, title: 'Umrah Visa Assistance', desc: 'Complete visa processing and documentation support.' },
  { icon: Plane, title: 'Return Airline Tickets', desc: 'Booking of return flights from your departure city.' },
  { icon: Hotel, title: 'Makkah Hotel Accommodation', desc: 'Comfortable stays close to the Haram.' },
  { icon: Hotel, title: 'Madinah Hotel Accommodation', desc: 'Peaceful hotels near Masjid-e-Nabawi.' },
  { icon: Car, title: 'Ground Transport Support', desc: 'Reliable transport between cities and sites.' },
  { icon: Map, title: 'Ziyarah Guidance', desc: 'Guided visits to significant Islamic sites.' },
  { icon: Users, title: 'Family & Group Packages', desc: 'Customised options for families and groups.' },
  { icon: MessageCircle, title: 'WhatsApp & Phone Support', desc: 'Friendly help whenever you need it.' },
];

export default function Services() {
  return (
    <section id="services" className="relative py-24 sm:py-32">
      <div className="absolute inset-0 bg-gradient-to-b from-transparent via-[#1a3d1a]/5 to-transparent" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
        <div className="text-center mb-16 reveal">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full glass-gold mb-5">
            <span className="text-xs text-[#a07830] tracking-wider uppercase">
              What We Offer
            </span>
          </div>
          <h2 className="text-3xl sm:text-4xl md:text-5xl font-bold text-[#1a3d1a] mb-4">
            Complete <span className="gradient-text-gold">Umrah Services</span>
          </h2>
          <p className="max-w-xl mx-auto text-[#1a3d1a]/65">
            Every detail of your journey, arranged with care — from visa to
            Ziyarah.
          </p>
        </div>

        <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
          {services.map((service, i) => (
            <div
              key={service.title}
              className="glass rounded-2xl p-6 card-hover reveal group"
              style={{ transitionDelay: `${i * 60}ms` }}
            >
              <div className="w-12 h-12 rounded-xl glass-gold flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                <service.icon size={22} className="text-[#a07830]" />
              </div>
              <h3 className="text-[#1a3d1a] font-semibold text-base mb-2">
                {service.title}
              </h3>
              <p className="text-xs text-[#1a3d1a]/60 leading-relaxed">
                {service.desc}
              </p>
            </div>
          ))}
        </div>

        {/* Quick contact strip */}
        <div className="mt-12 glass-emerald rounded-2xl p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-5 reveal">
          <div className="text-center sm:text-left">
            <div className="text-[#1a3d1a] font-semibold text-lg">
              Need help choosing a package?
            </div>
            <div className="text-sm text-[#1a3d1a]/60 mt-1">
              Our team is ready to assist you.
            </div>
          </div>
          <div className="flex gap-3">
            <a href="https://wa.me/923000000000" target="_blank" rel="noopener noreferrer" className="flex items-center gap-2 px-5 py-2.5 rounded-full btn-whatsapp text-sm">
              <MessageCircle size={16} /> WhatsApp
            </a>
            <a href="tel:+923000000000" className="flex items-center gap-2 px-5 py-2.5 rounded-full btn-outline-gold text-sm">
              <Phone size={16} /> Call
            </a>
          </div>
        </div>
      </div>
    </section>
  );
}
