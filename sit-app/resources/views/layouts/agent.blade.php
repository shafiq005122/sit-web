<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Agent Portal') — SIT</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: {
            colors: {
                emerald: { 50:'#ecfdf5',100:'#d1fae5',200:'#a7f3d0',300:'#6ee7b7',400:'#34d399',500:'#10b981',600:'#059669',700:'#047857',800:'#065f46',900:'#064e3b',950:'#022c22' },
                gold: { 50:'#fffbeb',100:'#fef3c7',200:'#fde68a',300:'#fcd34d',400:'#fbbf24',500:'#f59e0b',600:'#d97706',700:'#b45309' },
                cream: { 50:'#fefdf8',100:'#fdf9ee' },
            },
            fontFamily: { sans: ['Inter', 'sans-serif'] },
        }}}
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background: #f8fafc; }
        .gradient-emerald { background: linear-gradient(135deg, #065f46 0%, #047857 50%, #064e3b 100%); }
        .sidebar-link { transition: all 0.2s; }
        .sidebar-link:hover { background: rgba(245,158,11,0.15); }
        .sidebar-link.active { background: rgba(245,158,11,0.2); border-right: 3px solid #f59e0b; }
    </style>
</head>
<body class="min-h-screen">
    <div class="flex">
        <aside id="agent-sidebar" class="fixed top-0 left-0 h-full w-64 gradient-emerald text-cream-100 z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
            <div class="p-6 border-b border-emerald-700/50">
                <a href="{{ route('agent.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gold-500 flex items-center justify-center">
                        <svg class="w-6 h-6 text-emerald-800" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7v10l10 5 10-5V7L12 2z"/></svg>
                    </div>
                    <div>
                        <span class="block text-sm font-bold">SIT Agent</span>
                        <span class="block text-xs text-gold-300">B2B Portal</span>
                    </div>
                </a>
            </div>
            <nav class="py-4 px-3 space-y-1">
                <a href="{{ route('agent.dashboard') }}" class="sidebar-link {{ request()->routeIs('agent.dashboard') ? 'active' : '' }} flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('agent.packages') }}" class="sidebar-link {{ request()->routeIs('agent.packages') ? 'active' : '' }} flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Packages
                </a>
                <a href="{{ route('agent.groups') }}" class="sidebar-link {{ request()->routeIs('agent.groups') ? 'active' : '' }} flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Groups
                </a>
                <a href="{{ route('agent.bookings') }}" class="sidebar-link {{ request()->routeIs('agent.bookings') ? 'active' : '' }} flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Bookings
                </a>
                <a href="{{ route('agent.wallet') }}" class="sidebar-link {{ request()->routeIs('agent.wallet') ? 'active' : '' }} flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                    Wallet
                </a>
                <div class="pt-4 mt-4 border-t border-emerald-700/50">
                    <form action="{{ route('agent.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="sidebar-link w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-left">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>
        <div class="flex-1 lg:ml-64">
            <header class="bg-white border-b border-gray-200 sticky top-0 z-30">
                <div class="px-6 lg:px-8 py-4 flex items-center justify-between">
                    <h1 class="text-xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full gradient-emerald flex items-center justify-center text-white font-semibold text-sm">
                            {{ strtoupper(substr(auth('agent')->user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="hidden sm:block">
                            <p class="text-sm font-medium text-gray-800">{{ auth('agent')->user()->name ?? 'Agent' }}</p>
                            <p class="text-xs text-gray-500">{{ auth('agent')->user()->agency?->agency_name ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </header>
            <main class="p-6 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
