'use client';

import {
  Accordion,
  AccordionItem,
  AccordionTrigger,
  AccordionContent,
} from '@/components/ui/accordion';

const faqs = [
  {
    q: 'What is included in the Umrah package?',
    a: 'Packages may include visa assistance, airline ticket, hotel accommodation, transport, and Ziyarah support depending on the selected package.',
  },
  {
    q: 'Can I choose my room type?',
    a: 'Yes, you can select from sharing, quad, triple, or double room options based on availability.',
  },
  {
    q: 'Are family Umrah packages available?',
    a: 'Yes, family and group packages can be arranged according to your needs.',
  },
  {
    q: 'How can I book my Umrah package?',
    a: 'You can contact us through WhatsApp or phone for package details and booking confirmation.',
  },
];

export default function FAQ() {
  return (
    <section id="faq" className="relative py-24 sm:py-32">
      <div className="absolute inset-0 bg-gradient-to-b from-transparent via-[#1a3d1a]/5 to-transparent" />

      <div className="max-w-3xl mx-auto px-4 sm:px-6 relative z-10">
        <div className="text-center mb-12 reveal">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full glass-gold mb-5">
            <span className="text-xs text-[#a07830] tracking-wider uppercase">
              Frequently Asked Questions
            </span>
          </div>
          <h2 className="text-3xl sm:text-4xl md:text-5xl font-bold text-[#1a3d1a] mb-4">
            Questions <span className="gradient-text-gold">Answered</span>
          </h2>
        </div>

        <div className="glass rounded-2xl p-6 sm:p-8 reveal">
          <Accordion type="single" collapsible className="w-full">
            {faqs.map((faq, i) => (
              <AccordionItem
                key={faq.q}
                value={`item-${i}`}
                className="border-[#c9a84c]/25"
              >
                <AccordionTrigger className="text-left text-[#1a3d1a] hover:text-[#a07830] hover:no-underline text-sm sm:text-base">
                  {faq.q}
                </AccordionTrigger>
                <AccordionContent className="text-[#1a3d1a]/65 leading-relaxed">
                  {faq.a}
                </AccordionContent>
              </AccordionItem>
            ))}
          </Accordion>
        </div>
      </div>
    </section>
  );
}
