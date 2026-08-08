import { createClient } from '@supabase/supabase-js';

const supabaseUrl = process.env.NEXT_PUBLIC_SUPABASE_URL || process.env.SUPABASE_URL || '';
const supabaseAnonKey = process.env.NEXT_PUBLIC_SUPABASE_ANON_KEY || process.env.SUPABASE_ANON_KEY || '';

export const supabase = createClient(supabaseUrl, supabaseAnonKey);

export type Package = {
  id: string;
  name: string;
  duration: string;
  departure: string;
  airline: string;
  makkah_hotel: string;
  madinah_hotel: string;
  room_type: string;
  price: string;
  status: 'Available' | 'Limited' | 'Filling Fast';
  highlight: boolean;
  sort_order: number;
  created_at: string;
};
