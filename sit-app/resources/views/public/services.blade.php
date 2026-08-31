@extends('layouts.public')

@section('title', 'Our Services — Siddique Ibrahim Travel & Tours')

@section('content')
<!-- Hero -->
<section class="relative gradient-emerald text-cream-50 py-24 overflow-hidden">
    <div class="absolute inset-0 islamic-pattern"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="arabic text-3xl text-gold-300 mb-4">خدماتنا</p>
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Our Services</h1>
        <p class="text-lg md:text-xl text-cream-100/90 max-w-3xl mx-auto leading-relaxed">
            Comprehensive Umrah travel services designed to make your sacred journey
            seamless, comfortable, and spiritually fulfilling from start to finish.
        </p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-20 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $services = [
                    [
                        'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                        'title' => 'Umrah Packages',
                        'desc' => 'All-inclusive Umrah packages covering visa, flights, premium hotels near the Haram, ground transport, and expert guidance throughout your pilgrimage.',
                        'features' => ['Economy & Premium packages', '3 to 15 nights duration', 'Group & individual options'],
                    ],
                    [
                        'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                        'title' => 'Visa Processing',
                        'desc' => 'Hassle-free Umrah visa processing handled by our experienced team. We manage documentation, submission, and follow-up with the Saudi consulate.',
                        'features' => ['Fast turnaround', 'Documentation assistance', 'Embassy follow-up'],
                    ],
                    [
                        'icon' => 'M12 19l7-7 3 3-7 7-3-3z M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z M2 2l7.586 7.586 M11 11a2 2 0 100-4 2 2 0 000 4z',
                        'title' => 'Flight Booking',
                        'desc' => 'Competitive airfare from all major cities with preferred airlines. Direct and connecting flights to suit your schedule and budget.',
                        'features' => ['All major airlines', 'Direct & connecting flights', 'Group fare discounts'],
                    ],
                    [
                        'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
                        'title' => 'Hotel Reservations',
                        'desc' => 'Carefully selected hotels ranging from 3 to 5 stars, all within walking distance of the Haram in Makkah and the Prophet\'s Mosque in Madinah.',
                        'features' => ['Haram-distance hotels', '3★ to 5★ categories', 'Family & quad rooms'],
                    ],
                    [
                        'icon' => 'M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4',
                        'title' => 'Ground Transport',
                        'desc' => 'Comfortable, air-conditioned coaches for intercity travel between Makkah, Madinah, and Jeddah airport. Private cars also available.',
                        'features' => 'AC coaches & private cars', 'Airport transfers', 'Ziyarah tours included'],
                    ],
                    [
                        'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                        'title' => 'Group Departures',
                        'desc' => 'Organised group departures with dedicated group leaders, scholars, and medical support. Travel with fellow pilgrims in a supportive community.',
                        'features' => ['Group leaders & scholars', 'Medical support', 'Community atmosphere'],
                    ],
                    [
                        'icon' => 'M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z M18 13V3.055A9.001 9.001 0 008.055 13H18z',
                        'title' => 'Ziyarah Tours',
                        'desc' => 'Guided tours of significant Islamic historical sites in Makkah and Madinah, led by knowledgeable guides who bring history to life.',
                        'features' => ['Historical sites', 'Knowledgeable guides', 'Spiritual enrichment'],
                    ],
                    [
                        'icon' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z',
                        'title' => 'B2B Agent Portal',
                        'desc' => 'A dedicated portal for travel agents and agencies to book packages, manage groups, track commissions, and access wholesale rates.',
                        'features' => ['Wholesale pricing', 'Commission tracking', 'Group management'],
                    ],
                    [
                        'icon' => 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 5.656l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z',
                        'title' => '24/7 Pilgrim Support',
                        'desc' => 'Round-the-clock support in Makkah, Madinah, and back home. Our team is always one call away for any assistance you need.',
                        'features' => ['24/7 helpline', 'On-ground staff', 'Pre & post-departure support'],
                    ],
                ];
            @endphp
            @foreach($services as $service)
                <div class="bg-white rounded-2xl p-8 card-hover shadow-sm border border-gray-100">
                    <div class="w-14 h-14 rounded-xl gradient-emerald flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $service['icon'] }}"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $service['title'] }}</h3>
                    <p class="text-gray-600 leading-relaxed mb-5">{{ $service['desc'] }}</p>
                    <ul class="space-y-2">
                        @foreach($service['features'] as $feature)
                            <li class="flex items-start gap-2 text-sm text-gray-600">
                                <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-gold-600 font-semibold uppercase tracking-wider text-sm">How It Works</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-3">Your Journey in 4 Simple Steps</h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $steps = [
                    ['num' => '01', 'title' => 'Choose Your Package', 'desc' => 'Browse our range of Umrah packages and select the one that suits your needs and budget.'],
                    ['num' => '02', 'title' => 'Submit Documents', 'desc' => 'Provide your passport, photos, and vaccination certificate. We handle the visa processing.'],
                    ['num' => '03', 'title' => 'Confirm Booking', 'desc' => 'Select your departure group, confirm seats, and complete your booking with our team.'],
                    ['num' => '04', 'title' => 'Begin Your Journey', 'desc' => 'Meet your group at the airport and embark on your sacred journey with full support.'],
                ];
            @endphp
            @foreach($steps as $step)
                <div class="relative">
                    <div class="text-5xl font-bold text-emerald-100 mb-4">{{ $step['num'] }}</div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $step['title'] }}</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">{{ $step['desc'] }}</p>
                    @if(!$loop->last)
                        <div class="hidden lg:block absolute top-6 -right-4 text-emerald-200">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16 gradient-emerald text-cream-50 relative overflow-hidden">
    <div class="absolute inset-0 islamic-pattern"></div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Have Questions About Our Services?</h2>
        <p class="text-cream-100/80 mb-8 max-w-2xl mx-auto">Our team is ready to help you plan the perfect Umrah journey. Reach out today.</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-gold-500 text-emerald-900 font-semibold rounded-xl shadow-lg hover:bg-gold-400 transition-all">
                Contact Us
            </a>
            <a href="{{ route('packages.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-emerald-800/50 text-cream-50 font-semibold rounded-xl border border-emerald-600 hover:bg-emerald-800 transition-all">
                Browse Packages
            </a>
        </div>
    </div>
</section>
@endsection
