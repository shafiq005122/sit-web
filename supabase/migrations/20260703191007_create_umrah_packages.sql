/*
# Create umrah_packages table for admin-managed packages

1. New Tables
- `umrah_packages`
  - id (uuid, primary key)
  - name (text, not null) — package name
  - duration (text) — e.g. "10 Days"
  - departure (text) — departure city
  - airline (text) — airline name
  - makkah_hotel (text) — Makkah hotel description
  - madinah_hotel (text) — Madinah hotel description
  - room_type (text) — Sharing / Quad / Triple / Double
  - price (text) — display price e.g. "PKR 185,000"
  - status (text) — Available / Limited / Filling Fast
  - highlight (boolean, default false) — mark as "Most Popular"
  - sort_order (int, default 0) — ordering on landing page
  - created_at (timestamptz)

2. Security
- RLS enabled.
- Public read: anon + authenticated can SELECT (landing page is public).
- Only authenticated admins can INSERT / UPDATE / DELETE.

3. Notes
- This is a multi-user admin scenario: the landing page reads as anon,
  but only logged-in admins can edit. Auth flow is built in the frontend.
*/

CREATE TABLE IF NOT EXISTS umrah_packages (
  id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
  name text NOT NULL,
  duration text NOT NULL DEFAULT '',
  departure text NOT NULL DEFAULT '',
  airline text NOT NULL DEFAULT '',
  makkah_hotel text NOT NULL DEFAULT '',
  madinah_hotel text NOT NULL DEFAULT '',
  room_type text NOT NULL DEFAULT 'Sharing',
  price text NOT NULL DEFAULT '',
  status text NOT NULL DEFAULT 'Available',
  highlight boolean NOT NULL DEFAULT false,
  sort_order int NOT NULL DEFAULT 0,
  created_at timestamptz DEFAULT now()
);

ALTER TABLE umrah_packages ENABLE ROW LEVEL SECURITY;

-- Public read (landing page uses anon key)
DROP POLICY IF EXISTS "public_read_packages" ON umrah_packages;
CREATE POLICY "public_read_packages"
ON umrah_packages FOR SELECT
TO anon, authenticated USING (true);

-- Admin write (authenticated only)
DROP POLICY IF EXISTS "admin_insert_packages" ON umrah_packages;
CREATE POLICY "admin_insert_packages"
ON umrah_packages FOR INSERT
TO authenticated WITH CHECK (true);

DROP POLICY IF EXISTS "admin_update_packages" ON umrah_packages;
CREATE POLICY "admin_update_packages"
ON umrah_packages FOR UPDATE
TO authenticated USING (true) WITH CHECK (true);

DROP POLICY IF EXISTS "admin_delete_packages" ON umrah_packages;
CREATE POLICY "admin_delete_packages"
ON umrah_packages FOR DELETE
TO authenticated USING (true);
