'use client';

import Navbar from '@/components/Navbar';
import Hero from '@/components/Hero';
import About from '@/components/About';
import Services from '@/components/Services';
import Packages from '@/components/Packages';
import RoomTypes from '@/components/RoomTypes';
import Process from '@/components/Process';
import WhyChooseUs from '@/components/WhyChooseUs';
import Documents from '@/components/Documents';
import FAQ from '@/components/FAQ';
import CtaFooter from '@/components/CtaFooter';
import { useScrollReveal } from '@/hooks/use-scroll-reveal';

export default function Home() {
  useScrollReveal();

  return (
    <main className="relative min-h-screen">
      <Navbar />
      <Hero />
      <About />
      <Services />
      <Packages />
      <RoomTypes />
      <Process />
      <WhyChooseUs />
      <Documents />
      <FAQ />
      <CtaFooter />
    </main>
  );
}
