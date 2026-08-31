"use client";

import { FormEvent, useEffect, useState } from "react";
import "../app/umrah-reservation/reservation.css";

type GroupDetails = {
  groupCode?: string;
  groupTitle?: string;
  travelDate?: string;
  airline?: string;
  makkahHotel?: string;
  madinahHotel?: string;
  availableSeats?: string;
  prices?: {
    sharing?: string;
    quad?: string;
    triple?: string;
    double?: string;
  };
};

type Passenger = {
  passport: string;
  issueDate: string;
  expiryDate: string;
  surname: string;
  givenName: string;
  gender: string;
  dateOfBirth: string;
  childWithoutBed: boolean;
  additionalBaggage: boolean;
};

const emptyGroup: GroupDetails = { prices: {} };

const createPassenger = (): Passenger => ({
  passport: "",
  issueDate: "",
  expiryDate: "",
  surname: "",
  givenName: "",
  gender: "",
  dateOfBirth: "",
  childWithoutBed: false,
  additionalBaggage: false,
});

export default function UmrahReservationPage() {
  const [group, setGroup] = useState<GroupDetails>(emptyGroup);
  const [roomType, setRoomType] = useState("Sharing");
  const [pax, setPax] = useState(1);
  const [passengers, setPassengers] = useState<Passenger[]>([createPassenger()]);
  const [submitted, setSubmitted] = useState(false);

  useEffect(() => {
    const oid = new URLSearchParams(window.location.search).get("oid");
    const saved = oid ? sessionStorage.getItem(`selectedUmrGroup_${oid}`) : null;
    if (!saved) return;

    try {
      setGroup(JSON.parse(saved) as GroupDetails);
    } catch {
      setGroup(emptyGroup);
    }
  }, []);

  const maxSeats = Math.max(1, Math.min(Number(group.availableSeats) || 5, 50));
  const selectedPrice = group.prices?.[roomType.toLowerCase() as keyof NonNullable<GroupDetails["prices"]>] ?? "-";

  function updatePax(value: number): void {
    setPax(value);
    setPassengers((current) => Array.from({ length: value }, (_, index) => current[index] ?? createPassenger()));
  }

  function updatePassenger(index: number, field: keyof Passenger, value: string | boolean): void {
    setPassengers((current) => current.map((passenger, passengerIndex) => passengerIndex === index ? { ...passenger, [field]: value } : passenger));
  }

  function submitReservation(event: FormEvent<HTMLFormElement>): void {
    event.preventDefault();
    setSubmitted(true);
  }

  if (submitted) {
    return (
      <main className="reservation-page">
        <section className="reservation-success" role="status">
          <h2>Reservation request received</h2>
          <p>Thank you. Our travel team will review your details and contact you to confirm the booking.</p>
          <a href="/umrah-groups.html">Back to Umrah Groups</a>
        </section>
      </main>
    );
  }

  return (
    <main className="reservation-page">
      <form className="reservation-layout" onSubmit={submitReservation}>
        <section className="reservation-card reservation-details-card">
          <div className="reservation-card-header">Reservation Details</div>
          <div className="reservation-card-body">
            <label className="reservation-inline-field">
              <span>Customer:</span>
              <input name="customer" placeholder="Type to search customers..." required />
              <button type="button" className="customer-dropdown" aria-label="Open customer list">▼</button>
            </label>
            <label className="reservation-inline-field">
              <span>Family Head:</span>
              <input name="familyHead" required />
            </label>
            <div className="reservation-inline-field">
              <span>Room Type:</span>
              <select value={roomType} onChange={(event) => setRoomType(event.target.value)}>
                <option>Sharing</option>
                <option>Quad</option>
                <option>Triple</option>
                <option>Double</option>
              </select>
              <span className="pax-label">PAX:</span>
              <select value={pax} onChange={(event) => updatePax(Number(event.target.value))}>
                {Array.from({ length: maxSeats }, (_, index) => <option key={index + 1} value={index + 1}>{index + 1}</option>)}
              </select>
            </div>
            <label className="reservation-inline-field">
              <span>Notes:</span>
              <input name="notes" />
            </label>
          </div>
        </section>

        <section className="reservation-card group-details-card">
          <div className="reservation-card-header">Group Details <span className="reservation-code">{group.groupCode || "UG-100046"}</span></div>
          <div className="reservation-card-body">
            <div className="group-overview">
              <div><span className="group-label">{group.groupCode || "UG-10004"}</span><strong>{group.groupTitle || group.travelDate || "08-AUG"}</strong></div>
              <div className="seats-pill"><span>Seats</span><strong>{group.availableSeats || "5"}</strong></div>
            </div>
            <div className="travel-date">Travel: {group.travelDate || "08/08/2026"}</div>
            <div className="hotel-details">
              <div><strong>Airline:</strong> {group.airline || "SV-Saudi Arabian Airlines"}</div>
              <div><strong>Makkah:</strong> {group.makkahHotel || "DURRAT AL AKHYAR / SIMILAR"}</div>
              <div><strong>Madinah:</strong> {group.madinahHotel || "JOOD AL MARJAN / SIMILAR"}</div>
            </div>
            <div className="price-options">
              {(["Sharing", "Quad", "Triple", "Double"] as const).map((type) => (
                <button type="button" key={type} className={roomType === type ? "active" : ""} onClick={() => setRoomType(type)}>
                  <span>{type}</span><small>{group.prices?.[type.toLowerCase() as keyof NonNullable<GroupDetails["prices"]>] || (type === roomType ? selectedPrice : "-")}</small>
                </button>
              ))}
            </div>
          </div>
        </section>

        <section className="reservation-card reservation-passengers">
          <div className="reservation-card-header">Passengers</div>
          <div className="passenger-table-wrap">
            <table className="passenger-table">
              <thead><tr><th>SNO</th><th>Passport No</th><th>Issue Date</th><th>Expiry Date</th><th>Surname</th><th>Given Name</th><th>Gender</th><th>Date of Birth</th><th>Child Without Bed</th><th>Additional Baggage</th></tr></thead>
              <tbody>{passengers.map((passenger, index) => <tr key={index}>
                <td>{index + 1}</td>
                <td><input value={passenger.passport} onChange={(event) => updatePassenger(index, "passport", event.target.value)} required /></td>
                <td><input type="date" value={passenger.issueDate} onChange={(event) => updatePassenger(index, "issueDate", event.target.value)} required /></td>
                <td><input type="date" value={passenger.expiryDate} onChange={(event) => updatePassenger(index, "expiryDate", event.target.value)} required /></td>
                <td><input value={passenger.surname} onChange={(event) => updatePassenger(index, "surname", event.target.value)} required /></td>
                <td><input value={passenger.givenName} onChange={(event) => updatePassenger(index, "givenName", event.target.value)} required /></td>
                <td><select value={passenger.gender} onChange={(event) => updatePassenger(index, "gender", event.target.value)} required><option value="">--</option><option>Male</option><option>Female</option></select></td>
                <td><input type="date" value={passenger.dateOfBirth} onChange={(event) => updatePassenger(index, "dateOfBirth", event.target.value)} required /></td>
                <td><input type="checkbox" checked={passenger.childWithoutBed} onChange={(event) => updatePassenger(index, "childWithoutBed", event.target.checked)} /></td>
                <td><input type="checkbox" checked={passenger.additionalBaggage} onChange={(event) => updatePassenger(index, "additionalBaggage", event.target.checked)} /></td>
              </tr>)}</tbody>
            </table>
          </div>
        </section>

        <div className="reservation-actions"><button type="submit">✓ Register</button><a href="/umrah-groups.html">× Cancel</a></div>
      </form>
    </main>
  );
}
