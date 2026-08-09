import { Users, BedDouble, UserCircle, Heart } from 'lucide-react';

const rooms = [
  {
    icon: Users,
    name: 'Sharing Room',
    desc: 'Best for budget-friendly travel and group pilgrims.',
    tag: 'Budget',
  },
  {
    icon: BedDouble,
    name: 'Quad Room',
    desc: 'Suitable for families or small groups who want comfort at a reasonable price.',
    tag: 'Family',
  },
  {
    icon: UserCircle,
    name: 'Triple Room',
    desc: 'A balanced option for families and close relatives.',
    tag: 'Balanced',
  },
  {
    icon: Heart,
    name: 'Double Room',
    desc: 'Ideal for couples or pilgrims who prefer more privacy and comfort.',
    tag: 'Private',
  },
];

export default function RoomTypes() {
  return (
    <section id="rooms" className="relative py-24 sm:py-32">
      <div className="absolute inset-0 bg-gradient-to-b from-transparent via-[#1a3d1a]/5 to-transparent" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
        <div className="text-center mb-14 reveal">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full glass-emerald mb-5">
            <span className="text-xs text-[#2d5a2d] tracking-wider uppercase">
              Room Sharing Options
            </span>
          </div>
          <h2 className="text-3xl sm:text-4xl md:text-5xl font-bold text-[#1a3d1a] mb-4">
            Find Your <span className="gradient-text-gold">Comfort Level</span>
          </h2>
          <p className="max-w-xl mx-auto text-[#1a3d1a]/65">
            Choose the room type that suits your group and budget.
          </p>
        </div>

        <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
          {rooms.map((room, i) => (
            <div
              key={room.name}
              className="glass rounded-2xl p-6 card-hover reveal group relative overflow-hidden"
              style={{ transitionDelay: `${i * 70}ms` }}
            >
              <div className="absolute top-0 right-0 w-24 h-24 bg-[#c9a84c]/8 rounded-full blur-2xl group-hover:bg-[#c9a84c]/15 transition-all" />

              <div className="relative">
                <div className="w-14 h-14 rounded-2xl glass-gold flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                  <room.icon size={24} className="text-[#a07830]" />
                </div>
                <span className="text-[10px] text-[#a07830] uppercase tracking-wider">
                  {room.tag}
                </span>
                <h3 className="text-lg font-bold text-[#1a3d1a] mt-1 mb-2">
                  {room.name}
                </h3>
                <p className="text-xs text-[#1a3d1a]/60 leading-relaxed">
                  {room.desc}
                </p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
