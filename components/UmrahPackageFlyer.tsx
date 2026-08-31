"use client";

import Image from "next/image";
import { useRef } from "react";

/* ------------------------------------------------------------------ */
/*  Types                                                              */
/* ------------------------------------------------------------------ */

interface FlightLeg {
  date: string;
  route: string;
}

interface ValidityDate {
  date: string;
}

interface RoomRates {
  sharing: number;
  quad: number;
  triple: number;
  double: number;
}

interface HotelInfo {
  city: "Makkah" | "Madinah";
  name: string;
  note: string;
}

interface UmrahPackage {
  id: string;
  title: string;
  rates: RoomRates;
  hotels: HotelInfo[];
}

interface ContactPerson {
  name: string;
  role: string;
  phone: string;
}

/* ------------------------------------------------------------------ */
/*  Data                                                               */
/* ------------------------------------------------------------------ */

const HERO_IMAGES = {
  kaaba:
    "https://cdn.sanity.io/images/c45zig7g/production/1d6e6ef89a99edfc65df558a960093dab030ff24-319x222.png?fit=max&auto=format",
  masjid:
    "https://cdn.sanity.io/images/c45zig7g/production/fe15aed61218e65ff7bfa181f261656324467492-372x274.png?fit=max&auto=format",
};

const PACKAGE_DAYS = 21;
const AIRLINE = "AIRSIAL";
const DEPARTURE_CITIES = ["ISLAMABAD", "LAHORE"];

const OUTBOUND_FLIGHTS: FlightLeg[][] = [
  [
    { date: "10-SEP", route: "ISB-JED" },
    { date: "10-SEP", route: "ISB-JED" },
    { date: "17-SEP", route: "ISB-JED" },
    { date: "21-SEP", route: "ISB-JED" },
    { date: "26-SEP", route: "ISB-JED" },
  ],
  [
    { date: "10-SEP", route: "ISB-JED" },
    { date: "10-SEP", route: "ISB-JED" },
    { date: "17-SEP", route: "ISB-JED" },
    { date: "21-SEP", route: "ISB-JED" },
  ],
];

const RETURN_FLIGHTS: FlightLeg[][] = [
  [
    { date: "25-SEP", route: "JED-ISB" },
    { date: "25-SEP", route: "JED-ISB" },
    { date: "25-SEP", route: "JED-ISB" },
    { date: "25-SEP", route: "JED-ISB" },
    { date: "25-SEP", route: "JED-ISB" },
  ],
  [
    { date: "25-SEP", route: "JED-ISB" },
    { date: "25-SEP", route: "JED-ISB" },
    { date: "25-SEP", route: "JED-ISB" },
    { date: "25-SEP", route: "JED-ISB" },
  ],
];

const VALIDITY_DATES: ValidityDate[][] = [
  Array(5).fill({ date: "01-Aug-23" }),
  Array(5).fill({ date: "01-Aug-23" }),
];

const VALIDITY_DATES_ROW2: ValidityDate[][] = [
  Array(4).fill({ date: "01-Aug-23" }),
  Array(4).fill({ date: "01-Aug-23" }),
];

const PACKAGES: UmrahPackage[] = [
  {
    id: "package-1",
    title: "Package-1",
    rates: { sharing: 206500, quad: 212500, triple: 212500, double: 212500 },
    hotels: [
      { city: "Makkah", name: "Qasr-e-Saad", note: "Shuttle Service" },
      { city: "Madinah", name: "Durrah Qurban", note: "Shuttle Service" },
    ],
  },
  {
    id: "package-2",
    title: "Package-2",
    rates: { sharing: 217500, quad: 226500, triple: 241500, double: 271500 },
    hotels: [
      { city: "Makkah", name: "Qasr-e-Saad", note: "Shuttle Service" },
      { city: "Madinah", name: "Durrah Qurban", note: "Shuttle Service" },
    ],
  },
  {
    id: "package-3",
    title: "Package-3",
    rates: { sharing: 223500, quad: 226500, triple: 241500, double: 271500 },
    hotels: [
      { city: "Makkah", name: "Qasr-e-Saad", note: "Shuttle Service" },
      { city: "Madinah", name: "Durrah Qurban", note: "Shuttle Service" },
    ],
  },
];

const CHILD_PRICE = 159000;
const INFANT_PRICE = 59000;

const CONTACTS: ContactPerson[] = [
  { name: "Mirza Haider Ali Baig", role: "CEO", phone: "03008666955" },
  { name: "Tahir Mehmood", role: "Ticketing Manager", phone: "03005531393" },
  { name: "Tayyab Butt", role: "Umrah Incharge", phone: "03245747359" },
];

const HEAD_OFFICE_ADDRESS =
  "HEAD OFFICE: G-18, MID CITY MALL, CHANDI CHOWK, MURREE ROAD, RAWALPINDI";

/* ------------------------------------------------------------------ */
/*  Helpers                                                            */
/* ------------------------------------------------------------------ */

function formatPKR(amount: number): string {
  return `${amount.toLocaleString("en-PK")}/-`;
}

/* ------------------------------------------------------------------ */
/*  Color tokens (matches the dark-green + gold + cream flyer style)  */
/* ------------------------------------------------------------------ */
// darkGreen : #1a3d1a  →  bg-[#1a3d1a]
// gold      : #c9a84c  →  text-[#c9a84c] / border-[#c9a84c]
// cream     : #f5efe0  →  bg-[#f5efe0]
// red badge : #a01515  →  bg-[#a01515]

/* ------------------------------------------------------------------ */
/*  Small presentational components                                   */
/* ------------------------------------------------------------------ */

function Pill({
  children,
  className = "",
}: {
  children: React.ReactNode;
  className?: string;
}) {
  return (
    <div
      className={`rounded-xl border border-[#c9a84c] flex max-w-md py-2 px-5 my-2 mx-auto justify-evenly font-bold text-white bg-[#1a3d1a] shadow shadow-black/40 ${className}`}
    >
      {children}
    </div>
  );
}

function FlightColumn({ legs }: { legs: FlightLeg[] }) {
  return (
    <div>
      {legs.map((leg, i) => (
        <Pill key={`${leg.date}-${leg.route}-${i}`}>
          {leg.date} {leg.route}
        </Pill>
      ))}
    </div>
  );
}

function ValidityColumn({ dates }: { dates: ValidityDate[] }) {
  return (
    <div>
      {dates.map((d, i) => (
        <Pill key={`${d.date}-${i}`} className="bg-[#c9a84c] text-[#1a3d1a] border-[#1a3d1a]">
          {d.date}
        </Pill>
      ))}
    </div>
  );
}

function RateLine({ label, amount }: { label: string; amount: number }) {
  return (
    <div className="rounded-xl border border-[#c9a84c] bg-[#f5efe0] flex max-w-md py-3 my-2 mx-auto justify-evenly font-bold text-[#1a3d1a] text-xl shadow shadow-black/20">
      <span className="text-[#1a3d1a]">{label}:</span>
      <span className="text-[#a01515]">{formatPKR(amount)}</span>
    </div>
  );
}

function HotelCard({ hotel }: { hotel: HotelInfo }) {
  return (
    <div className="rounded-xl border border-[#c9a84c] bg-[#1a3d1a] flex flex-col items-center max-w-md py-2 my-2 mx-auto font-bold text-white shadow shadow-black/30">
      <div className="text-[#c9a84c] text-sm uppercase tracking-widest">{hotel.city} Hotel</div>
      <div className="text-white text-base">
        {hotel.name} <span className="text-[#c9a84c]">({hotel.note})</span>
      </div>
    </div>
  );
}

function PackageCard({ pkg }: { pkg: UmrahPackage }) {
  return (
    <div className="max-w-xs w-full md:w-1/4 px-2">
      {/* Title */}
      <div className="rounded-xl bg-[#1a3d1a] border-2 border-[#c9a84c] flex max-w-md py-3 px-5 my-4 mx-auto justify-evenly font-extrabold text-3xl text-[#c9a84c] shadow-md">
        {pkg.title}
      </div>

      {/* Sharing — hero rate */}
      <div className="rounded-xl border-2 border-[#1a3d1a] bg-[#f5efe0] flex flex-col items-center max-w-md py-3 my-3 mx-auto shadow-md">
        <span className="text-lg font-bold text-[#1a3d1a] tracking-widest">SHARING</span>
        <span className="text-4xl font-extrabold text-[#a01515]">{formatPKR(pkg.rates.sharing)}</span>
      </div>

      <RateLine label="QUAD" amount={pkg.rates.quad} />
      <RateLine label="TRIPLE" amount={pkg.rates.triple} />
      <RateLine label="DOUBLE" amount={pkg.rates.double} />

      {pkg.hotels.map((hotel) => (
        <HotelCard key={`${pkg.id}-${hotel.city}`} hotel={hotel} />
      ))}
    </div>
  );
}

/* ------------------------------------------------------------------ */
/*  Main component                                                     */
/* ------------------------------------------------------------------ */

export default function UmrahPackageFlyer() {
  const flyerRef = useRef<HTMLDivElement>(null);

  const handlePrint = () => {
    window.print();
  };

  const handleSaveAsJpg = async () => {
    if (!flyerRef.current) return;
    const { toJpeg } = await import("html-to-image");
    try {
      const dataUrl = await toJpeg(flyerRef.current, {
        quality: 0.95,
        backgroundColor: "#f5efe0",
      });
      const link = document.createElement("a");
      link.download = "umrah-package.jpg";
      link.href = dataUrl;
      link.click();
    } catch (error) {
      console.error("Failed to export flyer as JPG:", error);
    }
  };

  return (
    <main className="m-6 md:m-10">
      <div
        ref={flyerRef}
        id="main-content"
        className="text-center bg-[#f5efe0] border-4 border-[#c9a84c] rounded-2xl overflow-hidden"
        style={{ backgroundImage: "radial-gradient(ellipse at top, #fdf8ee 0%, #f0e8d0 100%)" }}
      >
        {/* ===== GOLD TOP BORDER STRIPE ===== */}
        <div className="h-2 w-full bg-[#c9a84c]" />

        {/* ===== Header ===== */}
        <div className="flex flex-col md:flex-row justify-between px-6 pt-4 pb-2 items-center gap-4">
          <Image
            src={HERO_IMAGES.kaaba}
            alt="Kaaba"
            width={300}
            height={200}
            className="h-[160px] w-auto drop-shadow-lg"
          />

          <div className="flex-1">
            {/* Title banner */}
            <div
              className="flex gap-3 justify-center items-center rounded-2xl border-2 border-[#c9a84c] py-3 px-6 my-3 mx-auto max-w-md font-bold text-white text-4xl shadow-lg"
              style={{ background: "linear-gradient(135deg, #1a3d1a 0%, #2d5a2d 100%)" }}
            >
              <h1 className="text-4xl text-[#c9a84c] font-extrabold">{PACKAGE_DAYS}</h1>
              <h1 className="text-3xl text-white font-bold">دن کا مکمل عمرہ پیکج</h1>
            </div>

            {/* Sub-title */}
            <div
              className="flex justify-center rounded-2xl border border-[#c9a84c] py-3 px-4 my-3 mx-auto max-w-md font-extrabold text-[#c9a84c] text-2xl shadow"
              style={{ background: "#111" }}
            >
              مکہ اور مدینہ کی زیارت پیکیج کے ساتھ
            </div>
          </div>

          <Image
            src={HERO_IMAGES.masjid}
            alt="Masjid"
            width={300}
            height={200}
            className="h-[160px] w-auto drop-shadow-lg"
          />
        </div>

        {/* ===== Gold divider ===== */}
        <div className="w-11/12 mx-auto h-[2px] bg-[#c9a84c] opacity-60 my-1" />

        {/* ===== Airline + departure cities ===== */}
        <div className="flex flex-col items-center gap-0 my-3">
          <div
            className="rounded-xl border-2 border-[#c9a84c] px-10 py-3 font-extrabold text-[#c9a84c] text-4xl tracking-widest shadow-md mb-3"
            style={{ background: "linear-gradient(135deg, #1a3d1a 0%, #2d5a2d 100%)" }}
          >
            {AIRLINE}
          </div>
          <div className="flex w-full px-6 gap-4">
            {DEPARTURE_CITIES.map((city) => (
              <div
                key={city}
                className="flex-1 rounded-xl border-2 border-[#c9a84c] py-3 font-extrabold text-white text-2xl text-center shadow"
                style={{ background: "linear-gradient(135deg, #1a3d1a 0%, #2d5a2d 100%)" }}
              >
                {city}
              </div>
            ))}
          </div>
        </div>

        {/* ===== Outbound / return flights ===== */}
        <div className="flex justify-around flex-wrap gap-6 px-4 my-3">
          {OUTBOUND_FLIGHTS.map((legs, i) => (
            <div key={`outbound-group-${i}`} className="flex gap-6 md:gap-20">
              <FlightColumn legs={legs} />
              <FlightColumn legs={RETURN_FLIGHTS[i]} />
            </div>
          ))}
        </div>

        {/* ===== Validity dates ===== */}
        <div className="flex justify-around flex-wrap gap-6 px-4 my-2">
          {VALIDITY_DATES.map((dates, i) => (
            <div key={`validity-group-${i}`} className="flex gap-6 md:gap-20">
              <ValidityColumn dates={dates} />
              <ValidityColumn dates={VALIDITY_DATES_ROW2[i]} />
            </div>
          ))}
        </div>

        {/* ===== Gold divider ===== */}
        <div className="w-11/12 mx-auto h-[2px] bg-[#c9a84c] opacity-60 my-4" />

        {/* ===== Package cards ===== */}
        <div className="flex flex-col md:flex-row justify-evenly px-2">
          {PACKAGES.map((pkg, i) => (
            <div key={pkg.id} className="flex items-stretch">
              <PackageCard pkg={pkg} />
              {i < PACKAGES.length - 1 && (
                <div className="hidden md:block w-[2px] bg-[#c9a84c] mx-2 my-6 opacity-40 rounded" />
              )}
            </div>
          ))}
        </div>

        {/* ===== Gold divider ===== */}
        <div className="w-11/12 mx-auto h-[2px] bg-[#c9a84c] opacity-60 my-4" />

        {/* ===== Child / infant pricing ===== */}
        <div className="flex flex-col md:flex-row justify-center gap-4 px-6 my-3">
          <div
            className="rounded-xl border-2 border-[#c9a84c] py-3 px-8 font-extrabold text-white text-3xl shadow-md flex-1 max-w-sm mx-auto"
            style={{ background: "linear-gradient(135deg, #1a3d1a 0%, #2d5a2d 100%)" }}
          >
            <span className="text-[#c9a84c]">CHILD: </span>
            {CHILD_PRICE.toLocaleString("en-PK")}
          </div>
          <div
            className="rounded-xl border-2 border-[#c9a84c] py-3 px-8 font-extrabold text-white text-3xl shadow-md flex-1 max-w-sm mx-auto"
            style={{ background: "linear-gradient(135deg, #1a3d1a 0%, #2d5a2d 100%)" }}
          >
            <span className="text-[#c9a84c]">INFANT: </span>
            {INFANT_PRICE.toLocaleString("en-PK")}
          </div>
        </div>

        {/* ===== Contacts ===== */}
        <div
          className="rounded-2xl border-2 border-[#c9a84c] w-11/12 px-8 py-4 my-4 mx-auto flex flex-col md:flex-row justify-evenly gap-4 font-bold text-white text-xl shadow-lg"
          style={{ background: "#111" }}
        >
          {CONTACTS.map((contact) => (
            <div key={contact.phone} className="flex flex-col items-center gap-1">
              <span className="text-[#c9a84c] text-lg">{contact.name}</span>
              <span className="text-gray-300 text-sm">{contact.role}</span>
              <span className="text-white text-xl font-extrabold">{contact.phone}</span>
            </div>
          ))}
        </div>

        {/* ===== Head office ===== */}
        <div
          className="rounded-xl border-2 border-[#c9a84c] max-w-4xl py-3 px-4 my-4 mx-auto font-bold text-[#c9a84c] text-xl shadow"
          style={{ background: "linear-gradient(135deg, #1a3d1a 0%, #2d5a2d 100%)" }}
        >
          {HEAD_OFFICE_ADDRESS}
        </div>

        {/* ===== GOLD BOTTOM BORDER STRIPE ===== */}
        <div className="h-2 w-full bg-[#c9a84c]" />
      </div>

      {/* ===== Action buttons (hidden on print) ===== */}
      <div className="flex justify-center gap-6 print:hidden mt-6">
        <button
          type="button"
          onClick={handlePrint}
          className="rounded-xl py-2 px-8 w-64 font-bold text-white border-2 border-[#c9a84c] transition-colors hover:bg-[#f5efe0] hover:text-[#1a3d1a]"
          style={{ background: "linear-gradient(135deg, #1a3d1a 0%, #2d5a2d 100%)" }}
        >
          Print
        </button>
        <button
          type="button"
          onClick={handleSaveAsJpg}
          className="rounded-xl py-2 px-8 w-64 font-bold border-2 transition-colors hover:text-white"
          style={{
            background: "linear-gradient(135deg, #c9a84c 0%, #e0c068 100%)",
            color: "#1a3d1a",
            borderColor: "#1a3d1a",
          }}
        >
          Save as JPG
        </button>
      </div>
    </main>
  );
}
