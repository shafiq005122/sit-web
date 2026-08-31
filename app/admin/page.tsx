'use client';

import { useState, useEffect } from 'react';
import { useRouter } from 'next/navigation';
import { Lock, Mail, ArrowRight, Eye, EyeOff } from 'lucide-react';
import { supabase } from '@/lib/supabase';

export default function AdminLogin() {
  const router = useRouter();
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [showPw, setShowPw] = useState(false);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState<string | null>(null);
  const [checking, setChecking] = useState(true);

  useEffect(() => {
    (async () => {
      const { data } = await supabase.auth.getSession();
      if (data.session) router.replace('/admin/dashboard');
      setChecking(false);
    })();
  }, [router]);

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    setError(null);

    const { error } = await supabase.auth.signInWithPassword({
      email,
      password,
    });

    if (error) {
      setError(error.message);
      setLoading(false);
    } else {
      router.replace('/admin/dashboard');
    }
  };

  if (checking) {
    return (
      <div className="min-h-screen bg-emerald-deep flex items-center justify-center">
        <div className="w-8 h-8 rounded-full border-2 border-[#c9a84c]/30 border-t-[#c9a84c] animate-spin" />
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-emerald-deep flex items-center justify-center relative overflow-hidden noise px-4">
      {/* Background orbs */}
      <div className="absolute top-1/4 left-10 w-72 h-72 rounded-full bg-[#c9a84c]/10 blur-3xl animate-orb" />
      <div className="absolute bottom-1/4 right-10 w-96 h-96 rounded-full bg-[#1a6b4a]/15 blur-3xl animate-orb delay-300" />

      <div className="relative z-10 w-full max-w-md">
        {/* Logo */}
        <div className="text-center mb-8">
          <div className="inline-flex w-16 h-16 rounded-full overflow-hidden ring-2 ring-[#c9a84c]/40 mb-4">
            <img src="/images/logo.png" alt="Logo" className="w-full h-full object-cover" />
          </div>
          <h1 className="text-2xl font-bold text-white">
            Admin <span className="gradient-text-gold">Login</span>
          </h1>
          <p className="text-sm text-[#f0ede6]/50 mt-2">
            Siddique Ibrahim Travel &amp; Tours
          </p>
        </div>

        {/* Glass form */}
        <form onSubmit={handleSubmit} className="glass-dark rounded-3xl p-7 sm:p-8 space-y-5">
          {error && (
            <div className="rounded-xl bg-[#e88a4c]/15 border border-[#e88a4c]/30 px-4 py-3 text-sm text-[#e88a4c]">
              {error}
            </div>
          )}

          <div className="space-y-2">
            <label className="text-xs text-[#e8c97a] uppercase tracking-wider">Email</label>
            <div className="relative">
              <Mail size={16} className="absolute left-3 top-1/2 -translate-y-1/2 text-[#c9a84c]/60" />
              <input
                type="email"
                required
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                placeholder="admin@example.com"
                className="w-full bg-white/[0.04] border border-[#c9a84c]/20 rounded-xl pl-10 pr-4 py-3 text-sm text-white placeholder:text-[#f0ede6]/30 focus:outline-none focus:border-[#c9a84c]/50 focus:bg-white/[0.06] transition-all"
              />
            </div>
          </div>

          <div className="space-y-2">
            <label className="text-xs text-[#e8c97a] uppercase tracking-wider">Password</label>
            <div className="relative">
              <Lock size={16} className="absolute left-3 top-1/2 -translate-y-1/2 text-[#c9a84c]/60" />
              <input
                type={showPw ? 'text' : 'password'}
                required
                value={password}
                onChange={(e) => setPassword(e.target.value)}
                placeholder="••••••••"
                className="w-full bg-white/[0.04] border border-[#c9a84c]/20 rounded-xl pl-10 pr-10 py-3 text-sm text-white placeholder:text-[#f0ede6]/30 focus:outline-none focus:border-[#c9a84c]/50 focus:bg-white/[0.06] transition-all"
              />
              <button
                type="button"
                onClick={() => setShowPw(!showPw)}
                className="absolute right-3 top-1/2 -translate-y-1/2 text-[#c9a84c]/60 hover:text-[#e8c97a]"
              >
                {showPw ? <EyeOff size={16} /> : <Eye size={16} />}
              </button>
            </div>
          </div>

          <button
            type="submit"
            disabled={loading}
            className="w-full flex items-center justify-center gap-2 py-3 rounded-xl btn-gold text-sm disabled:opacity-60"
          >
            {loading ? (
              <div className="w-5 h-5 rounded-full border-2 border-[#0a1a12]/30 border-t-[#0a1a12] animate-spin" />
            ) : (
              <>
                Sign In
                <ArrowRight size={16} />
              </>
            )}
          </button>

          <div className="text-center pt-2">
            <a href="/" className="text-xs text-[#f0ede6]/40 hover:text-[#e8c97a] transition-colors">
              ← Back to website
            </a>
          </div>
        </form>
      </div>
    </div>
  );
}
