<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Siddique Ibrahim Travel & Tours') — Umrah Packages</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        emerald: { 50:'#ecfdf5',100:'#d1fae5',200:'#a7f3d0',300:'#6ee7b7',400:'#34d399',500:'#10b981',600:'#059669',700:'#047857',800:'#065f46',900:'#064e3b',950:'#022c22' },
                        gold: { 50:'#fffbeb',100:'#fef3c7',200:'#fde68a',300:'#fcd34d',400:'#fbbf24',500:'#f59e0b',600:'#d97706',700:'#b45309',800:'#92400e',900:'#78350f' },
                        cream: { 50:'#fefdf8',100:'#fdf9ee',200:'#faf3dc' },
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        arabic: ['Amiri', 'serif'],
                    },
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background: #fefdf8; }
        .arabic { font-family: 'Amiri', serif; }
        .islamic-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%23047857' stroke-opacity='0.05' stroke-width='1'%3E%3Cpath d='M30 0l15 15-15 15-15-15 15-15zM30 30l15 15-15 15-15-15 15-15z'/%3E%3C/g%3E%3C/svg%3E");
        }
        .gradient-emerald { background: linear-gradient(135deg, #065f46 0%, #047857 50%, #064e3b 100%); }
        .gradient-gold { background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 50%, #f59e0b 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 40px -10px rgba(6,95,70,0.2); }
        .fade-in { animation: fadeIn 0.6s ease-out; }
        @keyframes fadeIn { from { opacity:0; transform:translateY(20px); } to { opacity:1; transform:translateY(0); } }
        .nav-link { position: relative; }
        .nav-link::after { content:''; position:absolute; bottom:-2px; left:0; width:0; height:2px; background:#f59e0b; transition:width 0.3s; }
        .nav-link:hover::after { width:100%; }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    @include('partials.public-navbar')
    <main class="flex-1">
        @yield('content')
    </main>
    @include('partials.public-footer')
    @yield('scripts')
</body>
</html>
