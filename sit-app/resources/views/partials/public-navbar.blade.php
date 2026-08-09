<nav class="sticky top-0 z-50 bg-cream-50/95 backdrop-blur-md border-b border-emerald-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full gradient-emerald flex items-center justify-center">
                    <svg class="w-7 h-7 text-gold-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7v10l10 5 10-5V7L12 2zm0 2.18L19.5 8 12 11.82 4.5 8 12 4.18zM4 9.27l7 3.5v7.96l-7-3.5V9.27zm9 11.46v-7.96l7-3.5v7.96l-7 3.5z"/></svg>
                </div>
                <div>
                    <span class="block text-lg font-bold text-emerald-800 leading-tight">Siddique Ibrahim</span>
                    <span class="block text-xs text-gold-600 font-medium tracking-wider">TRAVEL & TOURS</span>
                </div>
            </a>

            <div class="hidden lg:flex items-center gap-8">
                <a href="{{ route('home') }}" class="nav-link text-emerald-800 font-medium hover:text-emerald-600">Home</a>
                <a href="{{ route('about') }}" class="nav-link text-emerald-800 font-medium hover:text-emerald-600">About</a>
                <a href="{{ route('services') }}" class="nav-link text-emerald-800 font-medium hover:text-emerald-600">Services</a>
                <a href="{{ route('packages') }}" class="nav-link text-emerald-800 font-medium hover:text-emerald-600">Packages</a>
                <a href="{{ route('groups') }}" class="nav-link text-emerald-800 font-medium hover:text-emerald-600">Groups</a>
                <a href="{{ route('faq') }}" class="nav-link text-emerald-800 font-medium hover:text-emerald-600">FAQ</a>
                <a href="{{ route('contact') }}" class="nav-link text-emerald-800 font-medium hover:text-emerald-600">Contact</a>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('customer.login') }}" class="hidden sm:inline-flex px-4 py-2 text-emerald-700 font-medium border border-emerald-200 rounded-lg hover:bg-emerald-50 transition">Customer Login</a>
                <a href="{{ route('agent.login') }}" class="inline-flex px-4 py-2 gradient-emerald text-white font-medium rounded-lg hover:opacity-90 transition shadow-md">Agent Portal</a>
                <button id="mobile-menu-btn" class="lg:hidden p-2 text-emerald-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden lg:hidden pb-4 space-y-2">
            <a href="{{ route('home') }}" class="block px-4 py-2 text-emerald-800 hover:bg-emerald-50 rounded">Home</a>
            <a href="{{ route('about') }}" class="block px-4 py-2 text-emerald-800 hover:bg-emerald-50 rounded">About</a>
            <a href="{{ route('services') }}" class="block px-4 py-2 text-emerald-800 hover:bg-emerald-50 rounded">Services</a>
            <a href="{{ route('packages') }}" class="block px-4 py-2 text-emerald-800 hover:bg-emerald-50 rounded">Packages</a>
            <a href="{{ route('groups') }}" class="block px-4 py-2 text-emerald-800 hover:bg-emerald-50 rounded">Groups</a>
            <a href="{{ route('faq') }}" class="block px-4 py-2 text-emerald-800 hover:bg-emerald-50 rounded">FAQ</a>
            <a href="{{ route('contact') }}" class="block px-4 py-2 text-emerald-800 hover:bg-emerald-50 rounded">Contact</a>
            <a href="{{ route('customer.login') }}" class="block px-4 py-2 text-emerald-700 border-t border-emerald-100">Customer Login</a>
        </div>
    </div>
</nav>
<script>
document.getElementById('mobile-menu-btn')?.addEventListener('click', () => {
    document.getElementById('mobile-menu').classList.toggle('hidden');
});
</script>
