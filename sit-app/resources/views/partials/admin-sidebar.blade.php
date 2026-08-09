<aside id="admin-sidebar" class="fixed top-0 left-0 h-full w-64 gradient-emerald text-cream-100 z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
    <div class="p-6 border-b border-emerald-700/50">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gold-500 flex items-center justify-center">
                <svg class="w-6 h-6 text-emerald-800" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7v10l10 5 10-5V7L12 2z"/></svg>
            </div>
            <div>
                <span class="block text-sm font-bold">SIT Admin</span>
                <span class="block text-xs text-gold-300">Control Panel</span>
            </div>
        </a>
    </div>
    <nav class="py-4 overflow-y-auto h-[calc(100vh-80px)] space-y-1 px-3">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Dashboard
        </a>
        <a href="{{ route('admin.packages') }}" class="sidebar-link {{ request()->routeIs('admin.packages') ? 'active' : '' }} flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            Packages
        </a>
        <a href="{{ route('admin.groups') }}" class="sidebar-link {{ request()->routeIs('admin.groups') ? 'active' : '' }} flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            Groups
        </a>
        <a href="{{ route('admin.bookings') }}" class="sidebar-link {{ request()->routeIs('admin.bookings') ? 'active' : '' }} flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            Bookings
        </a>
        <a href="{{ route('admin.agencies') }}" class="sidebar-link {{ request()->routeIs('admin.agencies') ? 'active' : '' }} flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            Agencies
        </a>
        <a href="{{ route('admin.customers') }}" class="sidebar-link {{ request()->routeIs('admin.customers') ? 'active' : '' }} flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            Customers
        </a>
        <a href="{{ route('admin.payments') }}" class="sidebar-link {{ request()->routeIs('admin.payments') ? 'active' : '' }} flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
            Payments
        </a>
        <div class="pt-4 mt-4 border-t border-emerald-700/50 space-y-1">
            <a href="{{ route('home') }}" target="_blank" class="sidebar-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                View Website
            </a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="sidebar-link w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-left">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Logout
                </button>
            </form>
        </div>
    </nav>
</aside>
<div id="sidebar-overlay" class="hidden lg:hidden fixed inset-0 bg-black/50 z-40"></div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('admin-sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const toggleBtn = document.getElementById('sidebar-toggle');
    toggleBtn?.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    });
    overlay?.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });
});
</script>
