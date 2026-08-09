@extends('layouts.public')
@section('title', 'Home — Siddique Ibrahim Travel & Tours')

@section('content')
<!-- Hero Section -->
<section class="relative gradient-emerald text-white overflow-hidden">
    <div class="islamic-pattern absolute inset-0 opacity-30"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="max-w-3xl fade-in">
            <span class="inline-block px-4 py-1.5 bg-gold-500/20 text-gold-300 rounded-full text-sm font-medium mb-6">Premium Umrah Travel Services</span>
            <h1 class="text-4xl lg:text-6xl font-bold leading-tight mb-6">Embark on Your Sacred Journey with Confidence</h1>
            <p class="text-lg text-cream-100/80 mb-8 leading-relaxed">Siddique Ibrahim Travel & Tours offers premium Umrah packages with carefully curated hotels near the Haram, reliable transport, and full visa assistance — making your pilgrimage seamless and spiritually fulfilling.</p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('packages') }}" class="px-8 py-3.5 bg-gold-500 text-emerald-900 font-semibold rounded-lg hover:bg-gold-400 transition shadow-lg">Browse Packages</a>
                <a href="{{ route('contact') }}" class="px-8 py-3.5 border-2 border-gold-400 text-gold-300 font-semibold rounded-lg hover:bg-gold-500/10 transition">Contact Us</a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Bar -->
<section class="bg-emerald-800 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-2 lg:grid-cols-4 gap-6 text-center">
        <div><p class="text-3xl font-bold text-gold-400">15+</p><p class="text-sm text-cream-200/80 mt-1">Years Experience</p></div>
        <div><p class="text-3xl font-bold text-gold-400">25,000+</p><p class="text-sm text-cream-200/80 mt-1">Pilgrims Served</p></div>
        <div><p class="text-3xl font-bold text-gold-400">500+</p><p class="text-sm text-cream-200/80 mt-1">Departure Groups</p></div>
        <div><p class="text-3xl font-bold text-gold-400">100%</p><p class="text-sm text-cream-200/80 mt-1">Satisfaction</p></div>
    </div>
</section>

<!-- Featured Packages -->
<section class="py-20 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-gold-600 font-medium text-sm tracking-wider uppercase">Featured Packages</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-emerald-800 mt-2">Popular Umrah Packages</h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Choose from our carefully curated Umrah packages designed to meet every need and budget.</p>
        </div>
        @if($featuredPackages->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredPackages as $package)
            <div class="bg-white rounded-2xl overflow-hidden card-hover border border-gray-100">
                <div class="h-48 gradient-emerald relative">
                    <div class="islamic-pattern absolute inset-0 opacity-20"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="arabic text-5xl text-gold-400/50">بسم الله</span>
                    </div>
                    @if($package->is_featured)
                    <span class="absolute top-4 right-4 px-3 py-1 bg-gold-500 text-emerald-900 text-xs font-bold rounded-full">Featured</span>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-emerald-800">{{ $package->title }}</h3>
                    <p class="text-sm text-gray-500 mt-1">{{ $package->total_nights }} Nights · {{ $package->departure_city ?? 'Flexible' }}</p>
                    <div class="flex items-center gap-4 mt-4 text-sm text-gray-600">
                        <span class="flex items-center gap-1"><svg class="w-4 h-4 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/></svg> {{ $package->makkah_nights }} Makkah</span>
                        <span class="flex items-center gap-1"><svg class="w-4 h-4 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/></svg> {{ $package->madinah_nights }} Madinah</span>
                    </div>
                    <a href="{{ route('packages.show', $package->slug) }}" class="mt-6 block text-center px-4 py-2.5 bg-emerald-50 text-emerald-700 font-medium rounded-lg hover:bg-emerald-100 transition">View Details</a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12 text-gray-400">
            <p class="text-lg">Packages will appear here once published.</p>
        </div>
        @endif
        <div class="text-center mt-10">
            <a href="{{ route('packages') }}" class="inline-flex items-center gap-2 text-emerald-700 font-medium hover:text-emerald-600">View All Packages <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></a>
        </div>
    </div>
</section>

<!-- Services Preview -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-gold-600 font-medium text-sm tracking-wider uppercase">Our Services</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-emerald-800 mt-2">Complete Travel Support</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-8 rounded-2xl bg-cream-50 border border-emerald-100 card-hover">
                <div class="w-16 h-16 mx-auto rounded-full bg-emerald-100 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-emerald-800 mb-2">Visa Assistance</h3>
                <p class="text-sm text-gray-500">Complete Umrah visa processing with expert guidance and document support.</p>
            </div>
            <div class="text-center p-8 rounded-2xl bg-cream-50 border border-emerald-100 card-hover">
                <div class="w-16 h-16 mx-auto rounded-full bg-emerald-100 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <h3 class="text-lg font-bold text-emerald-800 mb-2">Hotel Booking</h3>
                <p class="text-sm text-gray-500">Premium hotels near Haram with verified proximity and comfortable accommodations.</p>
            </div>
            <div class="text-center p-8 rounded-2xl bg-cream-50 border border-emerald-100 card-hover">
                <div class="w-16 h-16 mx-auto rounded-full bg-emerald-100 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <h3 class="text-lg font-bold text-emerald-800 mb-2">Transport & Ziyarah</h3>
                <p class="text-sm text-gray-500">Comfortable transport for airport transfers and guided Ziyarah tours.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 gradient-emerald text-white relative overflow-hidden">
    <div class="islamic-pattern absolute inset-0 opacity-20"></div>
    <div class="relative max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold mb-4">Ready to Begin Your Sacred Journey?</h2>
        <p class="text-cream-100/80 mb-8 max-w-2xl mx-auto">Register as a travel agent to access exclusive B2B rates, or browse our packages as a customer.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('customer.register') }}" class="px-8 py-3.5 bg-gold-500 text-emerald-900 font-semibold rounded-lg hover:bg-gold-400 transition">Register as Customer</a>
            <a href="{{ route('agent.register') }}" class="px-8 py-3.5 border-2 border-gold-400 text-gold-300 font-semibold rounded-lg hover:bg-gold-500/10 transition">Register as Agent</a>
        </div>
    </div>
</section>
@endsection
