<header class="bg-white border-b border-gray-200 sticky top-0 z-30">
    <div class="px-6 lg:px-8 py-4 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <button id="sidebar-toggle" class="lg:hidden p-2 text-gray-600 rounded-lg hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <h1 class="text-xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
        </div>
        <div class="flex items-center gap-4">
            <button class="p-2 text-gray-500 hover:text-gray-700 rounded-lg hover:bg-gray-100 relative">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                <span class="absolute top-1 right-1 w-2 h-2 bg-gold-500 rounded-full"></span>
            </button>
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full gradient-emerald flex items-center justify-center text-white font-semibold text-sm">
                    {{ strtoupper(substr(auth('admin')->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="hidden sm:block">
                    <p class="text-sm font-medium text-gray-800">{{ auth('admin')->user()->name ?? 'Admin' }}</p>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
            </div>
        </div>
    </div>
</header>
