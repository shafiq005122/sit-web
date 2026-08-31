<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') — SIT</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        emerald: { 50:'#ecfdf5',100:'#d1fae5',200:'#a7f3d0',300:'#6ee7b7',400:'#34d399',500:'#10b981',600:'#059669',700:'#047857',800:'#065f46',900:'#064e3b',950:'#022c22' },
                        gold: { 50:'#fffbeb',100:'#fef3c7',200:'#fde68a',300:'#fcd34d',400:'#fbbf24',500:'#f59e0b',600:'#d97706',700:'#b45309' },
                        cream: { 50:'#fefdf8',100:'#fdf9ee' },
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background: #f8fafc; }
        .gradient-emerald { background: linear-gradient(135deg, #065f46 0%, #047857 50%, #064e3b 100%); }
        .sidebar-link { transition: all 0.2s; }
        .sidebar-link:hover { background: rgba(245,158,11,0.15); }
        .sidebar-link.active { background: rgba(245,158,11,0.2); border-right: 3px solid #f59e0b; }
        .card { transition: all 0.3s; }
        .card:hover { box-shadow: 0 10px 30px -5px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="min-h-screen">
    <div class="flex">
        @include('partials.admin-sidebar')
        <div class="flex-1 lg:ml-64 min-h-screen">
            @include('partials.admin-topbar')
            <main class="p-6 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>
    @yield('scripts')
</body>
</html>
