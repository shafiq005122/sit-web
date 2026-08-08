"use client";

import { FormEvent, ReactNode, useMemo, useState } from "react";

type LoginType = "email" | "mobile" | "cnic";

const BRAND = {
  name: "Siddique Ibrahim",
  suffix: "Travel & Tours",
  tagline: "Hajj • Umrah • Air Tickets • Tours",
  support: "+92 300 8666955",
  email: "info@siddiqueibrahim.com",
};

const LOGIN_CONFIG: Record<
  LoginType,
  { label: string; placeholder: string; inputMode: "email" | "tel" | "text" }
> = {
  email: {
    label: "Email Address",
    placeholder: "example@email.com",
    inputMode: "email",
  },
  mobile: {
    label: "Mobile Number",
    placeholder: "+92 300 1234567",
    inputMode: "tel",
  },
  cnic: {
    label: "CNIC",
    placeholder: "12345-1234567-1",
    inputMode: "text",
  },
};

function BrandMark() {
  return (
    <div
      className="grid h-20 w-20 shrink-0 place-items-center rounded-full border-[3px] border-[#d3ad54] bg-[#063d2d] shadow-[0_0_0_5px_rgba(211,173,84,.12)]"
      aria-hidden="true"
    >
      <div className="text-center leading-none">
        <div className="font-serif text-3xl font-black text-[#f1dc9c]">SI</div>
        <div className="mt-1 text-[9px] font-extrabold tracking-[.22em] text-white">TRAVEL</div>
      </div>
    </div>
  );
}

function EmailIcon() {
  return (
    <svg viewBox="0 0 24 24" className="h-4 w-4" fill="none" stroke="currentColor" strokeWidth="2">
      <path d="M4 5h16v14H4z" />
      <path d="m4 7 8 6 8-6" />
    </svg>
  );
}

function PhoneIcon() {
  return (
    <svg viewBox="0 0 24 24" className="h-4 w-4" fill="none" stroke="currentColor" strokeWidth="2">
      <path d="M7 3h4l2 5-3 2a15 15 0 0 0 4 4l2-3 5 2v4c0 2-2 4-4 4C9 21 3 15 3 7c0-2 2-4 4-4Z" />
    </svg>
  );
}

function IdIcon() {
  return (
    <svg viewBox="0 0 24 24" className="h-4 w-4" fill="none" stroke="currentColor" strokeWidth="2">
      <rect x="3" y="5" width="18" height="14" rx="2" />
      <circle cx="8" cy="11" r="2" />
      <path d="M6 16c.8-1.6 3.2-1.6 4 0M13 10h5M13 14h5" />
    </svg>
  );
}

function LockIcon() {
  return (
    <svg viewBox="0 0 24 24" className="h-4 w-4" fill="none" stroke="currentColor" strokeWidth="2">
      <rect x="5" y="10" width="14" height="11" rx="2" />
      <path d="M8 10V7a4 4 0 0 1 8 0v3" />
    </svg>
  );
}

function CalculatorIcon() {
  return (
    <svg viewBox="0 0 24 24" className="h-4 w-4" fill="none" stroke="currentColor" strokeWidth="2">
      <rect x="5" y="3" width="14" height="18" rx="2" />
      <path d="M8 7h8M8 11h2M14 11h2M8 15h2M14 15h2" />
    </svg>
  );
}

function EyeIcon({ hidden }: { hidden: boolean }) {
  return hidden ? (
    <svg viewBox="0 0 24 24" className="h-5 w-5" fill="none" stroke="currentColor" strokeWidth="2">
      <path d="M3 3l18 18" />
      <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8" />
      <path d="M9.9 4.2A10.9 10.9 0 0 1 12 4c5 0 9 4 10 8a12.2 12.2 0 0 1-2.4 4.5M6.6 6.6A12.5 12.5 0 0 0 2 12c1 4 5 8 10 8a10 10 0 0 0 4-.8" />
    </svg>
  ) : (
    <svg viewBox="0 0 24 24" className="h-5 w-5" fill="none" stroke="currentColor" strokeWidth="2">
      <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z" />
      <circle cx="12" cy="12" r="3" />
    </svg>
  );
}

function SearchIcon() {
  return (
    <svg viewBox="0 0 24 24" className="h-4 w-4" fill="none" stroke="currentColor" strokeWidth="2.4">
      <circle cx="11" cy="11" r="7" />
      <path d="m20 20-4-4" />
    </svg>
  );
}

function ArrowRightIcon() {
  return (
    <svg viewBox="0 0 24 24" className="h-4 w-4" fill="none" stroke="currentColor" strokeWidth="2.4">
      <path d="M5 12h14M13 6l6 6-6 6" />
    </svg>
  );
}

function LoginField({
  icon,
  label,
  children,
}: {
  icon: ReactNode;
  label: string;
  children: ReactNode;
}) {
  return (
    <div className="space-y-1.5">
      <label className="block ps-4 text-[13px] font-bold text-white">{label}</label>
      <div className="relative">
        <div className="absolute inset-y-0 left-0 grid w-12 place-items-center rounded-full bg-[#d3ad54]/15 text-[#f1dc9c] sm:w-14">
          {icon}
        </div>
        {children}
      </div>
    </div>
  );
}

export default function SiddiqueIbrahimLoginPage() {
  const [loginType, setLoginType] = useState<LoginType>("mobile");
  const [loginId, setLoginId] = useState("");
  const [password, setPassword] = useState("");
  const [captcha, setCaptcha] = useState("");
  const [remember, setRemember] = useState(true);
  const [showPassword, setShowPassword] = useState(false);
  const [message, setMessage] = useState("");

  const activeConfig = useMemo(() => LOGIN_CONFIG[loginType], [loginType]);

  const formatMobile = (value: string) => {
    const digits = value.replace(/\D/g, "").replace(/^92/, "").slice(0, 10);
    if (!digits) return "";
    const first = digits.slice(0, 3);
    const rest = digits.slice(3);
    return `+92 ${first}${rest ? ` ${rest}` : ""}`;
  };

  const formatCnic = (value: string) => {
    const digits = value.replace(/\D/g, "").slice(0, 13);
    if (digits.length <= 5) return digits;
    if (digits.length <= 12) return `${digits.slice(0, 5)}-${digits.slice(5)}`;
    return `${digits.slice(0, 5)}-${digits.slice(5, 12)}-${digits.slice(12)}`;
  };

  const handleLoginIdChange = (value: string) => {
    if (loginType === "mobile") {
      setLoginId(formatMobile(value));
      return;
    }
    if (loginType === "cnic") {
      setLoginId(formatCnic(value));
      return;
    }
    setLoginId(value);
  };

  const handleLoginType = (type: LoginType) => {
    setLoginType(type);
    setLoginId("");
    setMessage("");
  };

  const handleSubmit = (event: FormEvent<HTMLFormElement>) => {
    event.preventDefault();
    setMessage("");

    if (!loginId.trim() || !password.trim()) {
      setMessage("Please enter your login details.");
      return;
    }

    if (captcha.trim() !== "11") {
      setMessage("Captcha answer is incorrect.");
      return;
    }

    // Replace this demo block with your real authentication request.
    // Example:
    // await fetch("/api/login", {
    //   method: "POST",
    //   headers: { "Content-Type": "application/json" },
    //   body: JSON.stringify({ loginType, loginId, password, remember }),
    // });

    console.log({ loginType, loginId, password, remember });
    setMessage("Login form is ready. Connect handleSubmit to your authentication API.");
  };

  const loginIcon =
    loginType === "email" ? <EmailIcon /> : loginType === "mobile" ? <PhoneIcon /> : <IdIcon />;

  return (
    <main className="relative min-h-screen overflow-hidden bg-[#031f19] text-white">
      <div
        className="pointer-events-none absolute inset-0 opacity-30"
        style={{
          backgroundImage:
            "radial-gradient(circle at 15% 20%, rgba(211,173,84,.25), transparent 25rem), radial-gradient(circle at 85% 18%, rgba(37,133,99,.30), transparent 28rem), linear-gradient(135deg, rgba(255,255,255,.025) 25%, transparent 25%, transparent 50%, rgba(255,255,255,.025) 50%, rgba(255,255,255,.025) 75%, transparent 75%)",
          backgroundSize: "auto, auto, 52px 52px",
        }}
      />

      <div className="absolute -left-28 -top-28 h-80 w-80 rounded-full border-[55px] border-[#d3ad54]/10" />
      <div className="absolute -bottom-40 -right-32 h-96 w-96 rounded-full border-[65px] border-[#1ba879]/10" />

      <div className="relative z-10 mx-auto flex min-h-screen w-full max-w-7xl items-center justify-center px-4 py-8 sm:px-6 lg:px-8">
        <div className="grid w-full overflow-hidden rounded-[28px] border border-[#d3ad54]/35 bg-[#062d22]/75 shadow-[0_24px_80px_rgba(0,0,0,.42)] backdrop-blur-xl lg:grid-cols-[1.15fr_.85fr]">
          <section className="relative hidden min-h-[720px] overflow-hidden border-r border-[#d3ad54]/20 p-10 lg:flex lg:flex-col lg:justify-between">
            <div
              className="absolute inset-0 opacity-60"
              style={{
                background:
                  "linear-gradient(145deg, rgba(3,31,25,.45), rgba(6,61,45,.82)), radial-gradient(circle at 70% 30%, rgba(211,173,84,.16), transparent 23rem)",
              }}
            />

            <div className="relative z-10">
              <div className="flex items-center gap-4">
                <BrandMark />
                <div>
                  <p className="font-serif text-3xl font-black tracking-tight text-white">{BRAND.name}</p>
                  <p className="mt-1 text-sm font-extrabold uppercase tracking-[.25em] text-[#f1dc9c]">
                    {BRAND.suffix}
                  </p>
                </div>
              </div>

              <div className="mt-16 max-w-xl">
                <p className="mb-3 text-xs font-black uppercase tracking-[.26em] text-[#d3ad54]">
                  Your trusted travel partner
                </p>
                <h1 className="font-serif text-5xl font-black leading-tight text-white xl:text-6xl">
                  Your journey,
                  <span className="block text-[#f1dc9c]">managed with care.</span>
                </h1>
                <p className="mt-6 max-w-lg text-base leading-7 text-white/70">
                  Secure access for customers and staff to manage Umrah, Hajj, ticketing and travel services.
                </p>

                <div className="mt-8 flex flex-wrap gap-3">
                  {["Umrah", "Hajj", "Air Tickets", "Tours"].map((service) => (
                    <span
                      key={service}
                      className="rounded-full border border-[#d3ad54]/35 bg-white/5 px-4 py-2 text-xs font-bold text-[#f1dc9c]"
                    >
                      {service}
                    </span>
                  ))}
                </div>
              </div>
            </div>

            <div className="relative z-10 border-t border-[#d3ad54]/20 pt-6 text-sm text-white/60">
              <p className="font-bold text-white/85">{BRAND.tagline}</p>
              <div className="mt-2 flex flex-wrap gap-x-5 gap-y-1">
                <span>{BRAND.support}</span>
                <span>{BRAND.email}</span>
              </div>
            </div>
          </section>

          <section className="flex min-h-[720px] items-center justify-center p-4 sm:p-8 lg:p-10">
            <div className="w-full max-w-md">
              <div className="mb-7 flex flex-col items-center text-center lg:hidden">
                <BrandMark />
                <h1 className="mt-4 font-serif text-2xl font-black">{BRAND.name}</h1>
                <p className="mt-1 text-xs font-extrabold uppercase tracking-[.22em] text-[#f1dc9c]">
                  {BRAND.suffix}
                </p>
              </div>

              <div className="rounded-3xl border border-[#d3ad54]/35 bg-[#041e1e]/70 p-5 shadow-[0_16px_45px_rgba(0,0,0,.30)] sm:p-7">
                <div className="mb-6 text-center">
                  <p className="text-[11px] font-black uppercase tracking-[.25em] text-[#d3ad54]">Secure Account Access</p>
                  <h2 className="mt-2 text-2xl font-black text-white">Login</h2>
                  <p className="mt-2 text-sm text-white/55">Sign in to continue to your travel portal.</p>
                </div>

                <form className="space-y-4" onSubmit={handleSubmit}>
                  <div className="space-y-1.5">
                    <label className="block ps-4 text-[13px] font-bold text-white">Login Type</label>
                    <div className="grid grid-cols-3 gap-1.5 rounded-full border border-[#d3ad54]/15 bg-white/5 p-1">
                      {(["email", "mobile", "cnic"] as LoginType[]).map((type) => {
                        const active = loginType === type;
                        return (
                          <button
                            key={type}
                            type="button"
                            onClick={() => handleLoginType(type)}
                            className={[
                              "rounded-full px-3 py-2 text-xs font-extrabold transition",
                              active
                                ? "bg-gradient-to-r from-[#0b6848] to-[#1ba879] text-white shadow"
                                : "text-white/55 hover:bg-white/5 hover:text-white",
                            ].join(" ")}
                          >
                            {type === "email" ? "Email" : type === "mobile" ? "Mobile" : "CNIC"}
                          </button>
                        );
                      })}
                    </div>
                  </div>

                  <LoginField icon={loginIcon} label={activeConfig.label}>
                    <input
                      type={loginType === "email" ? "email" : "text"}
                      inputMode={activeConfig.inputMode}
                      autoComplete={loginType === "email" ? "email" : "username"}
                      value={loginId}
                      onChange={(e) => handleLoginIdChange(e.target.value)}
                      placeholder={activeConfig.placeholder}
                      className="w-full rounded-full border border-[#d3ad54]/15 bg-white/[.07] py-2.5 pe-4 ps-14 text-[13px] text-white outline-none placeholder:text-white/45 focus:border-[#d3ad54]/60 focus:ring-4 focus:ring-[#d3ad54]/10 sm:ps-16"
                      required
                    />
                  </LoginField>

                  <LoginField icon={<LockIcon />} label="Password">
                    <input
                      type={showPassword ? "text" : "password"}
                      value={password}
                      onChange={(e) => setPassword(e.target.value)}
                      placeholder="•••••••••••"
                      autoComplete="current-password"
                      className="w-full rounded-full border border-[#d3ad54]/15 bg-white/[.07] py-2.5 pe-12 ps-14 text-[13px] text-white outline-none placeholder:text-white/45 focus:border-[#d3ad54]/60 focus:ring-4 focus:ring-[#d3ad54]/10 sm:ps-16"
                      required
                    />
                    <button
                      type="button"
                      onClick={() => setShowPassword((value) => !value)}
                      className="absolute right-4 top-1/2 -translate-y-1/2 text-white/55 transition hover:text-[#f1dc9c]"
                      aria-label={showPassword ? "Hide password" : "Show password"}
                    >
                      <EyeIcon hidden={showPassword} />
                    </button>
                  </LoginField>

                  <LoginField icon={<CalculatorIcon />} label="What is 3 + 8?">
                    <input
                      type="text"
                      inputMode="numeric"
                      value={captcha}
                      onChange={(e) => setCaptcha(e.target.value.replace(/\D/g, "").slice(0, 3))}
                      placeholder="Enter the result"
                      className="w-full rounded-full border border-[#d3ad54]/15 bg-white/[.07] py-2.5 pe-4 ps-14 text-[13px] text-white outline-none placeholder:text-white/45 focus:border-[#d3ad54]/60 focus:ring-4 focus:ring-[#d3ad54]/10 sm:ps-16"
                      required
                    />
                  </LoginField>

                  <div className="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
                    <label className="flex cursor-pointer items-center gap-2.5">
                      <button
                        type="button"
                        role="switch"
                        aria-checked={remember}
                        onClick={() => setRemember((value) => !value)}
                        className={[
                          "relative h-5 w-10 rounded-full transition",
                          remember ? "bg-[#1ba879]" : "bg-white/15",
                        ].join(" ")}
                      >
                        <span
                          className={[
                            "absolute top-1/2 h-4 w-4 -translate-y-1/2 rounded-full bg-white shadow transition",
                            remember ? "left-5" : "left-0.5",
                          ].join(" ")}
                        />
                      </button>
                      <span className="text-sm text-white/60">Remember me</span>
                    </label>

                    <a href="/forgot-password" className="text-sm font-bold text-[#d3ad54] transition hover:text-[#f1dc9c] hover:underline">
                      Forgot Password?
                    </a>
                  </div>

                  {message && (
                    <div className="rounded-2xl border border-[#d3ad54]/25 bg-[#d3ad54]/10 px-4 py-3 text-xs leading-5 text-[#f1dc9c]">
                      {message}
                    </div>
                  )}

                  <button
                    type="submit"
                    className="flex w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-[#0b6848] via-[#147a55] to-[#c29a3d] py-3 text-sm font-extrabold text-white shadow-[0_10px_25px_rgba(0,0,0,.20)] transition hover:brightness-110 focus:outline-none focus:ring-4 focus:ring-[#d3ad54]/20"
                  >
                    Sign In
                    <ArrowRightIcon />
                  </button>

                  <p className="text-center text-sm text-white/55">
                    Don&apos;t have an account?{" "}
                    <a href="/register" className="font-extrabold text-[#d3ad54] hover:text-[#f1dc9c] hover:underline">
                      Sign Up
                    </a>
                  </p>

                  <div className="flex items-center py-1">
                    <div className="h-px flex-1 bg-[#d3ad54]/15" />
                    <span className="mx-3 text-[10px] font-semibold uppercase tracking-wider text-white/35">Or</span>
                    <div className="h-px flex-1 bg-[#d3ad54]/15" />
                  </div>

                  <div className="rounded-2xl border border-[#1ba879]/20 bg-[#123f44]/35 p-3 text-center">
                    <div className="mb-2 flex items-center justify-center gap-2">
                      <span className="h-2 w-2 animate-pulse rounded-full bg-[#d3ad54]" />
                      <span className="text-[11px] font-extrabold uppercase tracking-wide text-[#f1dc9c]">
                        Already applied? Check status
                      </span>
                    </div>

                    <a
                      href="/inquiry"
                      className="flex w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-[#0b6848] to-[#1ba879] py-2.5 text-xs font-extrabold text-white shadow transition hover:brightness-110"
                    >
                      <SearchIcon />
                      Application Inquiry
                    </a>
                  </div>
                </form>
              </div>

              <div className="mt-6 text-center text-[11px] leading-5 text-white/40">
                <p className="font-bold text-white/55">{BRAND.name} {BRAND.suffix}</p>
                <p>© {new Date().getFullYear()} All rights reserved.</p>
              </div>
            </div>
          </section>
        </div>
      </div>
    </main>
  );
}
