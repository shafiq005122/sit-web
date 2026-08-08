'use client';

import { useState, useEffect, useCallback } from 'react';
import { useRouter } from 'next/navigation';
import {
  Plus,
  Pencil,
  Trash2,
  LogOut,
  ExternalLink,
  X,
  Star,
  GripVertical,
} from 'lucide-react';
import { supabase, type Package } from '@/lib/supabase';

type FormState = {
  name: string;
  duration: string;
  departure: string;
  airline: string;
  makkah_hotel: string;
  madinah_hotel: string;
  room_type: string;
  price: string;
  status: string;
  highlight: boolean;
  sort_order: number;
};

const emptyForm: FormState = {
  name: '',
  duration: '',
  departure: '',
  airline: '',
  makkah_hotel: '',
  madinah_hotel: '',
  room_type: 'Sharing',
  price: '',
  status: 'Available',
  highlight: false,
  sort_order: 0,
};

const roomTypes = ['Sharing', 'Quad', 'Triple', 'Double'];
const statuses = ['Available', 'Limited', 'Filling Fast'];

export default function AdminDashboard() {
  const router = useRouter();
  const [packages, setPackages] = useState<Package[]>([]);
  const [loading, setLoading] = useState(true);
  const [authChecked, setAuthChecked] = useState(false);
  const [modalOpen, setModalOpen] = useState(false);
  const [editingId, setEditingId] = useState<string | null>(null);
  const [form, setForm] = useState<FormState>(emptyForm);
  const [saving, setSaving] = useState(false);
  const [formError, setFormError] = useState<string | null>(null);
  const [deleteId, setDeleteId] = useState<string | null>(null);

  const fetchPackages = useCallback(async () => {
    const { data, error } = await supabase
      .from('umrah_packages')
      .select('*')
      .order('sort_order', { ascending: true });
    if (!error && data) setPackages(data as Package[]);
    setLoading(false);
  }, []);

  useEffect(() => {
    (async () => {
      const { data } = await supabase.auth.getSession();
      if (!data.session) {
        router.replace('/admin');
        return;
      }
      setAuthChecked(true);
      fetchPackages();
    })();
  }, [router, fetchPackages]);

  const handleLogout = async () => {
    await supabase.auth.signOut();
    router.replace('/admin');
  };

  const openNew = () => {
    setForm({ ...emptyForm, sort_order: packages.length + 1 });
    setEditingId(null);
    setFormError(null);
    setModalOpen(true);
  };

  const openEdit = (pkg: Package) => {
    setForm({
      name: pkg.name,
      duration: pkg.duration,
      departure: pkg.departure,
      airline: pkg.airline,
      makkah_hotel: pkg.makkah_hotel,
      madinah_hotel: pkg.madinah_hotel,
      room_type: pkg.room_type,
      price: pkg.price,
      status: pkg.status,
      highlight: pkg.highlight,
      sort_order: pkg.sort_order,
    });
    setEditingId(pkg.id);
    setFormError(null);
    setModalOpen(true);
  };

  const handleSave = async (e: React.FormEvent) => {
    e.preventDefault();
    if (!form.name.trim() || !form.price.trim()) {
      setFormError('Package name and price are required.');
      return;
    }
    setSaving(true);
    setFormError(null);

    if (editingId) {
      const { error } = await supabase
        .from('umrah_packages')
        .update(form)
        .eq('id', editingId);
      if (error) setFormError(error.message);
    } else {
      const { error } = await supabase.from('umrah_packages').insert(form);
      if (error) setFormError(error.message);
    }

    if (!formError) {
      setModalOpen(false);
      fetchPackages();
    }
    setSaving(false);
  };

  const confirmDelete = async () => {
    if (!deleteId) return;
    const { error } = await supabase
      .from('umrah_packages')
      .delete()
      .eq('id', deleteId);
    if (!error) {
      setDeleteId(null);
      fetchPackages();
    }
  };

  if (!authChecked) {
    return (
      <div className="min-h-screen bg-emerald-deep flex items-center justify-center">
        <div className="w-8 h-8 rounded-full border-2 border-[#c9a84c]/30 border-t-[#c9a84c] animate-spin" />
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-emerald-deep">
      {/* Top bar */}
      <header className="glass-dark sticky top-0 z-30">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 py-4 flex items-center justify-between">
          <div className="flex items-center gap-3">
            <div className="w-10 h-10 rounded-full overflow-hidden ring-2 ring-[#c9a84c]/40">
              <img src="/images/logo.png" alt="Logo" className="w-full h-full object-cover" />
            </div>
            <div>
              <div className="text-sm font-semibold text-[#e8c97a]">Admin Dashboard</div>
              <div className="text-[10px] text-[#c9a84c]/60 tracking-wider uppercase">Siddique Ibrahim Travel</div>
            </div>
          </div>
          <div className="flex items-center gap-3">
            <a
              href="/"
              target="_blank"
              className="hidden sm:flex items-center gap-2 px-4 py-2 rounded-full text-sm btn-outline-gold"
            >
              <ExternalLink size={15} />
              View Site
            </a>
            <button
              onClick={handleLogout}
              className="flex items-center gap-2 px-4 py-2 rounded-full text-sm bg-[#e88a4c]/15 border border-[#e88a4c]/30 text-[#e88a4c] hover:bg-[#e88a4c]/25 transition-all"
            >
              <LogOut size={15} />
              Logout
            </button>
          </div>
        </div>
      </header>

      <main className="max-w-7xl mx-auto px-4 sm:px-6 py-8">
        {/* Stats */}
        <div className="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
          {[
            { label: 'Total Packages', value: packages.length, accent: 'text-[#e8c97a]' },
            { label: 'Available', value: packages.filter((p) => p.status === 'Available').length, accent: 'text-[#2d9367]' },
            { label: 'Filling Fast', value: packages.filter((p) => p.status === 'Filling Fast').length, accent: 'text-[#e88a4c]' },
            { label: 'Highlighted', value: packages.filter((p) => p.highlight).length, accent: 'text-[#c9a84c]' },
          ].map((stat) => (
            <div key={stat.label} className="glass rounded-2xl p-5">
              <div className={`text-2xl font-bold ${stat.accent}`}>{stat.value}</div>
              <div className="text-xs text-[#f0ede6]/50 mt-1">{stat.label}</div>
            </div>
          ))}
        </div>

        {/* Packages section */}
        <div className="flex items-center justify-between mb-5">
          <h2 className="text-xl font-bold text-white">Umrah Packages</h2>
          <button
            onClick={openNew}
            className="flex items-center gap-2 px-5 py-2.5 rounded-full btn-gold text-sm"
          >
            <Plus size={16} />
            Add Package
          </button>
        </div>

        {loading && (
          <div className="space-y-3">
            {[0, 1, 2].map((i) => (
              <div key={i} className="glass rounded-2xl p-5 h-20 animate-pulse" />
            ))}
          </div>
        )}

        {!loading && packages.length === 0 && (
          <div className="glass rounded-2xl p-12 text-center">
            <p className="text-[#f0ede6]/50 text-sm mb-4">No packages yet.</p>
            <button onClick={openNew} className="inline-flex items-center gap-2 px-5 py-2.5 rounded-full btn-gold text-sm">
              <Plus size={16} /> Add your first package
            </button>
          </div>
        )}

        {/* Package list */}
        {!loading && packages.length > 0 && (
          <div className="space-y-3">
            {packages.map((pkg) => (
              <div
                key={pkg.id}
                className="glass rounded-2xl p-5 flex items-center gap-4 flex-wrap sm:flex-nowrap card-hover"
              >
                <GripVertical size={18} className="text-[#c9a84c]/30 hidden sm:block shrink-0" />

                <div className="flex-1 min-w-0">
                  <div className="flex items-center gap-2 flex-wrap">
                    <h3 className="text-white font-semibold text-sm">{pkg.name}</h3>
                    {pkg.highlight && (
                      <span className="flex items-center gap-1 text-[10px] text-[#e8c97a] bg-[#c9a84c]/15 border border-[#c9a84c]/30 px-2 py-0.5 rounded-full">
                        <Star size={10} /> Featured
                      </span>
                    )}
                  </div>
                  <div className="text-xs text-[#f0ede6]/50 mt-1 flex gap-3 flex-wrap">
                    <span>{pkg.duration}</span>
                    <span>·</span>
                    <span>{pkg.departure}</span>
                    <span>·</span>
                    <span>{pkg.room_type}</span>
                    <span>·</span>
                    <span>{pkg.airline}</span>
                  </div>
                </div>

                <div className="text-right shrink-0">
                  <div className="text-sm font-bold gradient-text-gold">{pkg.price}</div>
                  <div className="text-[10px] text-[#f0ede6]/40 mt-0.5">{pkg.status}</div>
                </div>

                <div className="flex gap-2 shrink-0">
                  <button
                    onClick={() => openEdit(pkg)}
                    className="w-9 h-9 rounded-full glass-gold flex items-center justify-center hover:scale-110 transition-transform"
                    aria-label="Edit"
                  >
                    <Pencil size={14} className="text-[#e8c97a]" />
                  </button>
                  <button
                    onClick={() => setDeleteId(pkg.id)}
                    className="w-9 h-9 rounded-full bg-[#e88a4c]/15 border border-[#e88a4c]/30 flex items-center justify-center hover:scale-110 transition-transform"
                    aria-label="Delete"
                  >
                    <Trash2 size={14} className="text-[#e88a4c]" />
                  </button>
                </div>
              </div>
            ))}
          </div>
        )}
      </main>

      {/* Edit / Create modal */}
      {modalOpen && (
        <div className="fixed inset-0 z-50 flex items-center justify-center p-4">
          <div
            className="absolute inset-0 bg-black/70 backdrop-blur-sm"
            onClick={() => setModalOpen(false)}
          />
          <div className="relative z-10 w-full max-w-2xl max-h-[90vh] overflow-y-auto glass-dark rounded-3xl p-6 sm:p-8 animate-fadeInUp">
            <div className="flex items-center justify-between mb-6">
              <h3 className="text-lg font-bold text-white">
                {editingId ? 'Edit Package' : 'New Package'}
              </h3>
              <button
                onClick={() => setModalOpen(false)}
                className="w-9 h-9 rounded-full glass flex items-center justify-center text-[#f0ede6]/60 hover:text-white"
              >
                <X size={16} />
              </button>
            </div>

            <form onSubmit={handleSave} className="space-y-4">
              {formError && (
                <div className="rounded-xl bg-[#e88a4c]/15 border border-[#e88a4c]/30 px-4 py-3 text-sm text-[#e88a4c]">
                  {formError}
                </div>
              )}

              <div className="grid sm:grid-cols-2 gap-4">
                <Field label="Package Name *">
                  <input
                    required
                    value={form.name}
                    onChange={(e) => setForm({ ...form, name: e.target.value })}
                    className={inputCls}
                    placeholder="Economy Umrah Package"
                  />
                </Field>
                <Field label="Price *">
                  <input
                    required
                    value={form.price}
                    onChange={(e) => setForm({ ...form, price: e.target.value })}
                    className={inputCls}
                    placeholder="PKR 185,000"
                  />
                </Field>
                <Field label="Duration">
                  <input
                    value={form.duration}
                    onChange={(e) => setForm({ ...form, duration: e.target.value })}
                    className={inputCls}
                    placeholder="10 Days"
                  />
                </Field>
                <Field label="Departure City">
                  <input
                    value={form.departure}
                    onChange={(e) => setForm({ ...form, departure: e.target.value })}
                    className={inputCls}
                    placeholder="Karachi"
                  />
                </Field>
                <Field label="Airline">
                  <input
                    value={form.airline}
                    onChange={(e) => setForm({ ...form, airline: e.target.value })}
                    className={inputCls}
                    placeholder="Saudi Arabian Airlines"
                  />
                </Field>
                <Field label="Room Type">
                  <select
                    value={form.room_type}
                    onChange={(e) => setForm({ ...form, room_type: e.target.value })}
                    className={inputCls}
                  >
                    {roomTypes.map((rt) => (
                      <option key={rt} value={rt} className="bg-[#0a1a12]">{rt}</option>
                    ))}
                  </select>
                </Field>
                <Field label="Makkah Hotel">
                  <input
                    value={form.makkah_hotel}
                    onChange={(e) => setForm({ ...form, makkah_hotel: e.target.value })}
                    className={inputCls}
                    placeholder="3★ — 800m from Haram"
                  />
                </Field>
                <Field label="Madinah Hotel">
                  <input
                    value={form.madinah_hotel}
                    onChange={(e) => setForm({ ...form, madinah_hotel: e.target.value })}
                    className={inputCls}
                    placeholder="3★ — 700m from Nabawi"
                  />
                </Field>
                <Field label="Status">
                  <select
                    value={form.status}
                    onChange={(e) => setForm({ ...form, status: e.target.value })}
                    className={inputCls}
                  >
                    {statuses.map((s) => (
                      <option key={s} value={s} className="bg-[#0a1a12]">{s}</option>
                    ))}
                  </select>
                </Field>
                <Field label="Sort Order">
                  <input
                    type="number"
                    value={form.sort_order}
                    onChange={(e) => setForm({ ...form, sort_order: parseInt(e.target.value) || 0 })}
                    className={inputCls}
                  />
                </Field>
              </div>

              <label className="flex items-center gap-3 cursor-pointer">
                <button
                  type="button"
                  onClick={() => setForm({ ...form, highlight: !form.highlight })}
                  className={`w-11 h-6 rounded-full transition-all relative ${form.highlight ? 'gradient-gold' : 'bg-white/10'}`}
                >
                  <span className={`absolute top-0.5 left-0.5 w-5 h-5 rounded-full bg-white transition-transform ${form.highlight ? 'translate-x-5' : ''}`} />
                </button>
                <span className="text-sm text-[#f0ede6]/80 flex items-center gap-1.5">
                  <Star size={14} className="text-[#e8c97a]" />
                  Mark as &quot;Most Popular&quot; (highlighted on landing page)
                </span>
              </label>

              <div className="flex gap-3 pt-3">
                <button
                  type="button"
                  onClick={() => setModalOpen(false)}
                  className="flex-1 py-3 rounded-xl btn-outline-gold text-sm"
                >
                  Cancel
                </button>
                <button
                  type="submit"
                  disabled={saving}
                  className="flex-1 py-3 rounded-xl btn-gold text-sm disabled:opacity-60"
                >
                  {saving ? 'Saving...' : editingId ? 'Save Changes' : 'Create Package'}
                </button>
              </div>
            </form>
          </div>
        </div>
      )}

      {/* Delete confirmation */}
      {deleteId && (
        <div className="fixed inset-0 z-50 flex items-center justify-center p-4">
          <div
            className="absolute inset-0 bg-black/70 backdrop-blur-sm"
            onClick={() => setDeleteId(null)}
          />
          <div className="relative z-10 w-full max-w-sm glass-dark rounded-3xl p-6 sm:p-8 text-center animate-fadeInUp">
            <div className="w-14 h-14 rounded-full bg-[#e88a4c]/15 border border-[#e88a4c]/30 flex items-center justify-center mx-auto mb-4">
              <Trash2 size={24} className="text-[#e88a4c]" />
            </div>
            <h3 className="text-lg font-bold text-white mb-2">Delete this package?</h3>
            <p className="text-sm text-[#f0ede6]/60 mb-6">
              This action cannot be undone. The package will be removed from your landing page.
            </p>
            <div className="flex gap-3">
              <button
                onClick={() => setDeleteId(null)}
                className="flex-1 py-2.5 rounded-xl btn-outline-gold text-sm"
              >
                Cancel
              </button>
              <button
                onClick={confirmDelete}
                className="flex-1 py-2.5 rounded-xl bg-[#e88a4c] text-white text-sm font-semibold hover:bg-[#d97a3c] transition-all"
              >
                Delete
              </button>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}

const inputCls =
  'w-full bg-white/[0.04] border border-[#c9a84c]/20 rounded-xl px-3.5 py-2.5 text-sm text-white placeholder:text-[#f0ede6]/30 focus:outline-none focus:border-[#c9a84c]/50 transition-all';

function Field({ label, children }: { label: string; children: React.ReactNode }) {
  return (
    <div className="space-y-1.5">
      <label className="text-[11px] text-[#e8c97a]/80 uppercase tracking-wider">{label}</label>
      {children}
    </div>
  );
}
