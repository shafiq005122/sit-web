<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My Account') — SIT</title>
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
    </style>
</head>
<body class="min-h-screen">
    <header class="gradient-emerald text-cream-100 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
            <a href="{{ route('customer.dashboard') }}" class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-gold-500 flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-800" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7v10l10 5 10-5V7L12 2z"/></svg>
                </div>
                <span class="text-sm font-bold">SIT Customer Portal</span>
            </a>
            <div class="flex items-center gap-6">
                <a href="{{ route('customer.dashboard') }}" class="text-sm hover:text-gold-300 {{ request()->routeIs('customer.dashboard') ? 'text-gold-300 font-medium' : '' }}">Dashboard</a>
                <a href="{{ route('customer.bookings') }}" class="text-sm hover:text-gold-300 {{ request()->routeIs('customer.bookings') ? 'text-gold-300 font-medium' : '' }}">Bookings</a>
                <a href="{{ route('customer.profile') }}" class="text-sm hover:text-gold-300 {{ request()->routeIs('customer.profile') ? 'text-gold-300 font-medium' : '' }}">Profile</a>
                <form action="{{ route('customer.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-sm hover:text-gold-300">Logout</button>
                </form>
            </div>
        </div>
    </header>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>
</body>
</html>
