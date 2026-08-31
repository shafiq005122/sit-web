import { FileText, IdCard, Camera, Syringe, CreditCard } from 'lucide-react';

const docs = [
  { icon: FileText, name: 'Valid Passport' },
  { icon: IdCard, name: 'CNIC Copy' },
  { icon: Camera, name: 'Passport-size Photographs' },
  { icon: Syringe, name: 'Vaccination or Travel Documents (if required)' },
  { icon: CreditCard, name: 'Advance Payment Confirmation' },
];

export default function Documents() {
  return (
    <section id="documents" className="relative py-24 sm:py-32 overflow-hidden">
      <div className="absolute bottom-0 right-1/4 w-80 h-80 rounded-full bg-[#c9a84c]/10 blur-3xl" />

      <div className="max-w-5xl mx-auto px-4 sm:px-6 relative z-10">
        <div className="text-center mb-14 reveal">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full glass-gold mb-5">
            <span className="text-xs text-[#a07830] tracking-wider uppercase">
              Documents Required
            </span>
          </div>
          <h2 className="text-3xl sm:text-4xl md:text-5xl font-bold text-[#1a3d1a] mb-4">
            Prepare Your <span className="gradient-text-gold">Documents</span>
          </h2>
          <p className="max-w-xl mx-auto text-[#1a3d1a]/65">
            Keep these ready for a smooth booking and visa process.
          </p>
        </div>

        <div className="glass rounded-3xl p-6 sm:p-10 reveal">
          <div className="grid sm:grid-cols-2 gap-4">
            {docs.map((doc, i) => (
              <div
                key={doc.name}
                className="flex items-center gap-4 p-4 rounded-xl bg-[#1a3d1a]/5 hover:bg-[#1a3d1a]/10 transition-all reveal"
                style={{ transitionDelay: `${i * 60}ms` }}
              >
                <div className="w-11 h-11 rounded-xl glass-gold flex items-center justify-center shrink-0">
                  <doc.icon size={20} className="text-[#a07830]" />
                </div>
                <span className="text-sm text-[#1a3d1a]/85">{doc.name}</span>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
