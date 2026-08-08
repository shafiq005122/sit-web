'use client';

import { useState, useEffect } from 'react';
import { Plane, Building2, Calendar, MapPin, BedDouble, Tag, CheckCircle2 } from 'lucide-react';
import { supabase, type Package } from '@/lib/supabase';

type Status = 'Available' | 'Limited' | 'Filling Fast';

const FALLBACK_PACKAGES: Package[] = [
  {
    id: '1',
    name: 'Economy Umrah Package',
    duration: '10 Days',
    departure: 'Karachi',
    airline: 'Saudi Arabian Airlines',
    makkah_hotel: '3★ — 800m from Haram',
    madinah_hotel: '3★ — 700m from Nabawi',
    room_type: 'Sharing',
    price: 'PKR 185,000',
    status: 'Available',
    highlight: false,
    sort_order: 1,
    created_at: '',
  },
  {
    id: '2',
    name: 'Standard Umrah Package',
    duration: '14 Days',
    departure: 'Lahore',
    airline: 'Pakistan International',
    makkah_hotel: '4★ — 500m from Haram',
    madinah_hotel: '4★ — 400m from Nabawi',
    room_type: 'Quad',
    price: 'PKR 245,000',
    status: 'Filling Fast',
    highlight: true,
    sort_order: 2,
    created_at: '',
  },
  {
    id: '3',
    name: 'Premium Umrah Package',
    duration: '18 Days',
    departure: 'Islamabad',
    airline: 'Emirates',
    makkah_hotel: '5★ — 300m from Haram',
    madinah_hotel: '5★ — 250m from Nabawi',
    room_type: 'Triple',
    price: 'PKR 365,000',
    status: 'Limited',
    highlight: false,
    sort_order: 3,
    created_at: '',
  },
  {
    id: '4',
    name: 'Deluxe Family Package',
    duration: '21 Days',
    departure: 'Karachi',
    airline: 'Qatar Airways',
    makkah_hotel: '5★ — 200m from Haram',
    madinah_hotel: '5★ — 200m from Nabawi',
    room_type: 'Double',
    price: 'PKR 485,000',
    status: 'Available',
    highlight: false,
    sort_order: 4,
    created_at: '',
  },
];

const statusStyles: Record<Status, string> = {
  Available: 'text-[#2d5a2d] bg-[#2d5a2d]/10 border-[#2d5a2d]/30',
  Limited: 'text-[#a07830] bg-[#c9a84c]/15 border-[#c9a84c]/40',
  'Filling Fast': 'text-[#a01515] bg-[#a01515]/10 border-[#a01515]/30',
};

export default function Packages() {
  const [filter, setFilter] = useState<string>('All');
  const [packages, setPackages] = useState<Package[]>([]);
  const [loading, setLoading] = useState(true);

  const filters = ['All', 'Sharing', 'Quad', 'Triple', 'Double'];

  useEffect(() => {
    (async () => {
      try {
        const { data, error } = await supabase
          .from('umrah_packages')
          .select('*')
          .order('sort_order', { ascending: true });

        if (error || !data) {
          setPackages(FALLBACK_PACKAGES);
        } else {
          setPackages(data as Package[]);
        }
      } catch {
        setPackages(FALLBACK_PACKAGES);
      } finally {
        setLoading(false);
      }
    })();
  }, []);

  const filtered =
    filter === 'All' ? packages : packages.filter((p) => p.room_type === filter);

  return (
    <section id="packages" className="relative py-24 sm:py-32 overflow-hidden">
      <div className="absolute top-1/3 right-0 w-96 h-96 rounded-full bg-[#c9a84c]/12 blur-3xl" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
        <div className="text-center mb-12 reveal">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full glass-gold mb-5">
            <span className="text-xs text-[#a07830] tracking-wider uppercase">
              Featured Umrah Packages
            </span>
          </div>
          <h2 className="text-3xl sm:text-4xl md:text-5xl font-bold text-[#1a3d1a] mb-4">
            Choose Your <span className="gradient-text-gold">Package</span>
          </h2>
          <p className="max-w-xl mx-auto text-[#1a3d1a]/65">
            Options based on duration, airline, hotel category, and room sharing.
          </p>
        </div>

        {/* Filters */}
        <div className="flex flex-wrap items-center justify-center gap-2 mb-10 reveal">
          {filters.map((f) => (
            <button
              key={f}
              onClick={() => setFilter(f)}
              className={`px-4 py-2 rounded-full text-sm transition-all ${
                filter === f
                  ? 'btn-gold'
                  : 'glass text-[#1a3d1a]/70 hover:text-[#a07830]'
              }`}
            >
              {f}
            </button>
          ))}
        </div>

        {/* Loading state */}
        {loading && (
          <div className="grid md:grid-cols-2 gap-6">
            {[0, 1, 2, 3].map((i) => (
              <div key={i} className="glass rounded-3xl p-7 h-64 animate-pulse" />
            ))}
          </div>
        )}

        {/* Empty state */}
        {!loading && filtered.length === 0 && (
          <div className="glass rounded-2xl p-10 text-center text-[#1a3d1a]/50">
            No packages available for this room type right now.
          </div>
        )}

        {/* Cards */}
        {!loading && filtered.length > 0 && (
          <div key={filter} className="grid md:grid-cols-2 gap-6">
            {filtered.map((pkg, i) => (
              <div
                key={pkg.id}
                className={`relative rounded-3xl p-7 card-hover animate-fadeInUp ${
                  pkg.highlight ? 'glass-gold ring-2 ring-[#c9a84c]/50' : 'glass'
                }`}
                style={{ animationDelay: `${i * 80}ms` }}
              >
                {pkg.highlight && (
                  <div className="absolute -top-3 left-7 px-3 py-1 rounded-full gradient-gold text-[10px] font-bold text-[#1a3d1a] tracking-wider uppercase">
                    Most Popular
                  </div>
                )}

                <div className="flex items-start justify-between mb-5">
                  <div>
                    <h3 className="text-xl font-bold text-[#1a3d1a]">{pkg.name}</h3>
                    <div className="flex items-center gap-2 mt-2">
                      <span className={`text-[10px] px-2.5 py-1 rounded-full border ${statusStyles[pkg.status as Status]}`}>
                        {pkg.status}
                      </span>
                    </div>
                  </div>
                  <div className="text-right">
                    <div className="text-2xl font-bold gradient-text-gold">
                      {pkg.price}
                    </div>
                    <div className="text-[10px] text-[#1a3d1a]/50">per person</div>
                  </div>
                </div>

                <div className="divider-gold mb-5" />

                <div className="grid grid-cols-2 gap-4">
                  {[
                    { icon: Calendar, label: 'Duration', value: pkg.duration },
                    { icon: MapPin, label: 'Departure', value: pkg.departure },
                    { icon: Plane, label: 'Airline', value: pkg.airline },
                    { icon: BedDouble, label: 'Room Type', value: pkg.room_type },
                    { icon: Building2, label: 'Makkah', value: pkg.makkah_hotel },
                    { icon: Building2, label: 'Madinah', value: pkg.madinah_hotel },
                  ].map((row) => (
                    <div key={row.label} className="flex items-start gap-2.5">
                      <row.icon size={16} className="text-[#a07830] mt-0.5 shrink-0" />
                      <div>
                        <div className="text-[10px] text-[#1a3d1a]/45 uppercase tracking-wider">
                          {row.label}
                        </div>
                        <div className="text-xs text-[#1a3d1a]/85 leading-snug">
                          {row.value}
                        </div>
                      </div>
                    </div>
                  ))}
                </div>

                <a
                  href="/umrah-groups.html"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="mt-6 flex items-center justify-center gap-2 w-full py-3 rounded-full btn-gold text-sm"
                >
                  <CheckCircle2 size={16} />
                  Book This Package
                </a>
              </div>
            ))}
          </div>
        )}

        {/* Inclusion note */}
        <div className="mt-10 glass rounded-2xl p-6 flex flex-col sm:flex-row items-center gap-4">
          <Tag size={22} className="text-[#a07830] shrink-0" />
          <p className="text-xs text-[#1a3d1a]/60 text-center sm:text-left">
            <span className="text-[#a07830] font-semibold">Package details can include:</span>{' '}
            travel duration, departure city, airline, Makkah hotel, Madinah hotel,
            room type (Sharing, Quad, Triple, Double), package price, and booking status.
          </p>
        </div>
      </div>
    </section>
  );
}
