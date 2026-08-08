import { ClipboardList, FileText, CheckCircle2, Plane, Moon } from 'lucide-react';

const steps = [
  {
    icon: ClipboardList,
    title: 'Select Your Package',
    desc: 'Choose the Umrah package that matches your budget and travel plan.',
  },
  {
    icon: FileText,
    title: 'Submit Documents',
    desc: 'Send your passport, CNIC copy, photos, and required travel documents.',
  },
  {
    icon: CheckCircle2,
    title: 'Confirm Booking',
    desc: 'Confirm package availability, travel date, and payment details.',
  },
  {
    icon: Plane,
    title: 'Receive Travel Plan',
    desc: 'Get your visa, ticket, hotel, and transport details.',
  },
  {
    icon: Moon,
    title: 'Begin Your Umrah Journey',
    desc: 'Travel with peace of mind and complete guidance.',
  },
];

export default function Process() {
  return (
    <section id="process" className="relative py-24 sm:py-32 overflow-hidden">
      <div className="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[600px] rounded-full bg-[#c9a84c]/10 blur-3xl" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
        <div className="text-center mb-16 reveal">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full glass-gold mb-5">
            <span className="text-xs text-[#a07830] tracking-wider uppercase">
              Simple Booking Process
            </span>
          </div>
          <h2 className="text-3xl sm:text-4xl md:text-5xl font-bold text-[#1a3d1a] mb-4">
            Five Steps to <span className="gradient-text-gold">Your Journey</span>
          </h2>
        </div>

        <div className="relative">
          {/* Connecting line for desktop */}
          <div className="hidden lg:block absolute top-[60px] left-[10%] right-[10%] h-px bg-gradient-to-r from-transparent via-[#c9a84c]/40 to-transparent" />

          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            {steps.map((step, i) => (
              <div
                key={step.title}
                className="relative reveal"
                style={{ transitionDelay: `${i * 100}ms` }}
              >
                <div className="glass rounded-2xl p-6 text-center card-hover h-full">
                  <div className="relative mx-auto w-16 h-16 mb-5">
                    <div className="absolute inset-0 rounded-full gradient-gold opacity-20 animate-glow" />
                    <div className="relative w-16 h-16 rounded-full glass-gold flex items-center justify-center">
                      <step.icon size={24} className="text-[#a07830]" />
                    </div>
                    <div className="absolute -top-1 -right-1 w-6 h-6 rounded-full gradient-gold flex items-center justify-center text-[10px] font-bold text-[#1a3d1a]">
                      {i + 1}
                    </div>
                  </div>
                  <h3 className="text-sm font-bold text-[#1a3d1a] mb-2">
                    {step.title}
                  </h3>
                  <p className="text-xs text-[#1a3d1a]/60 leading-relaxed">
                    {step.desc}
                  </p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
