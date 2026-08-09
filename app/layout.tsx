import './globals.css';
import type { Metadata } from 'next';

export const metadata: Metadata = {
  metadataBase: new URL('https://sit-umrah.vercel.app'),
  title: 'Siddique Ibrahim Travel & Tours — Umrah Packages from Pakistan',
  description:
    'Affordable & reliable Umrah packages from Pakistan. Visa assistance, airline tickets, hotels in Makkah & Madinah, transport, and Ziyarah support.',
  keywords: 'Umrah packages Pakistan, Umrah visa, Makkah hotel, Madinah hotel, Hajj Umrah travel',
  openGraph: {
    title: 'Siddique Ibrahim Travel & Tours — Umrah Packages',
    description: 'Perform your sacred journey with peace, comfort, and confidence.',
    images: [{ url: '/images/logo.png' }],
  },
  twitter: {
    card: 'summary_large_image',
    images: [{ url: '/images/logo.png' }],
  },
};

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="en">
      <head>
        <link
          href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap"
          rel="stylesheet"
        />
      </head>
      <body>{children}</body>
    </html>
  );
}
