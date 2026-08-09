@extends('layouts.public')

@section('title', 'About Us — Siddique Ibrahim Travel & Tours')

@section('content')
<!-- Hero Section -->
<section class="relative gradient-emerald text-cream-50 py-24 overflow-hidden">
    <div class="absolute inset-0 islamic-pattern"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="arabic text-3xl text-gold-300 mb-4">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Our Story</h1>
        <p class="text-lg md:text-xl text-cream-100/90 max-w-3xl mx-auto leading-relaxed">
            For over two decades, Siddique Ibrahim Travel & Tours has been honoured to serve
            the guests of Allah, guiding thousands of pilgrims on their sacred journey to
            the holy cities of Makkah and Madinah.
        </p>
    </div>
</section>

<!-- Company Story -->
<section class="py-20 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="fade-in">
                <span class="inline-block px-4 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-sm font-semibold mb-4">
                    Established 2003
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">
                    A Legacy of Trust &amp; Devotion
                </h2>
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>
                        Siddique Ibrahim Travel &amp; Tours was founded in 2003 by Haji Siddique Ibrahim,
                        a passionate pilgrim who recognised the need for a travel service that combined
                        logistical excellence with deep spiritual understanding. What began as a small
                        family-run agency has grown into one of the most trusted Umrah operators in the region.
                    </p>
                    <p>
                        Our journey started with a simple promise: to make the sacred journey of Umrah
                        accessible, affordable, and spiritually fulfilling for every Muslim. Today, we
                        operate hundreds of departure groups each year, serving pilgrims from across the
                        country with the same family values and personal care that defined our founding.
                    </p>
                    <p>
                        Every member of our team — from our licensed scholars to our ground staff in
                        Makkah and Madinah — shares a single mission: to serve the guests of Allah with
                        excellence, sincerity, and unwavering integrity.
                    </p>
                </div>
            </div>
            <div class="relative fade-in">
                <div class="rounded-2xl overflow-hidden shadow-2xl">
                    <div class="aspect-[4/3] gradient-emerald flex items-center justify-center islamic-pattern">
                        <div class="text-center text-cream-50 p-8">
                            <svg class="w-24 h-24 mx-auto mb-4 text-gold-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7v10l10 5 10-5V7L12 2zm0 2.236L19.764 8 12 11.764 4.236 8 12 4.236zM4 9.618l7 3.5v7.764l-7-3.5V9.618zm9 11.264v-7.764l7-3.5v7.764l-7 3.5z"/>
                            </svg>
                            <p class="arabic text-2xl text-gold-300 mb-2">الكعبة المشرفة</p>
                            <p class="text-sm text-cream-100/80">The Holy Ka'bah — Our Spiritual North Star</p>
                        </div>
                    </div>
                </div>
                <div class="absolute -bottom-6 -left-6 bg-gold-500 text-emerald-900 px-6 py-4 rounded-xl shadow-xl">
                    <p class="text-3xl font-bold">20+</p>
                    <p class="text-sm font-medium">Years of Service</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Our Mission &amp; Vision</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Guiding principles that shape every journey we organise</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Mission -->
            <div class="bg-cream-50 rounded-2xl p-8 card-hover border border-emerald-100">
                <div class="w-14 h-14 rounded-xl gradient-emerald flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Our Mission</h3>
                <p class="text-gray-600 leading-relaxed">
                    To facilitate a seamless, spiritually enriching Umrah journey for every pilgrim
                    by providing comprehensive travel services, expert guidance, and compassionate
                    care — from the moment of booking until the safe return home. We strive to remove
                    every worldly worry so our guests may focus solely on their ibadah.
                </p>
            </div>
            <!-- Vision -->
            <div class="bg-cream-50 rounded-2xl p-8 card-hover border border-gold-200">
                <div class="w-14 h-14 rounded-xl bg-gold-500 flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-emerald-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Our Vision</h3>
                <p class="text-gray-600 leading-relaxed">
                    To be the most trusted and respected Umrah travel partner in the country — recognised
                    for our integrity, the quality of our service, and our unwavering commitment to the
                    spiritual dignity of every pilgrim we are honoured to serve.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="py-20 bg-cream-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-gold-600 font-semibold uppercase tracking-wider text-sm">What We Stand For</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-3">Our Core Values</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">The principles that guide every decision and every journey</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $values = [
                    ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Integrity', 'desc' => 'Honest pricing, transparent terms, and truthful guidance in every interaction. No hidden charges, no false promises.'],
                    ['icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'title' => 'Compassion', 'desc' => 'We treat every pilgrim as family — with patience, kindness, and genuine care for their comfort and spiritual wellbeing.'],
                    ['icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z', 'title' => 'Excellence', 'desc' 'From premium hotels near the Haram to meticulous itinerary planning, we pursue excellence in every detail of your journey.'],
                    ['icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3', 'title' => 'Faithfulness', 'desc' => 'We operate with deep reverence for the sacred rites of Umrah, ensuring every service aligns with Islamic principles.'],
                ];
            @endphp
            @foreach($values as $value)
                <div class="bg-white rounded-2xl p-6 card-hover shadow-sm border border-gray-100">
                    <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $value['icon'] }}"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $value['title'] }}</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">{{ $value['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Stats -->
<section class="py-20 gradient-emerald text-cream-50 relative overflow-hidden">
    <div class="absolute inset-0 islamic-pattern"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            <div>
                <p class="text-4xl md:text-5xl font-bold text-gold-400 mb-2">25,000+</p>
                <p class="text-cream-100/80 text-sm uppercase tracking-wider">Pilgrims Served</p>
            </div>
            <div>
                <p class="text-4xl md:text-5xl font-bold text-gold-400 mb-2">500+</p>
                <p class="text-cream-100/80 text-sm uppercase tracking-wider">Departure Groups</p>
            </div>
            <div>
                <p class="text-4xl md:text-5xl font-bold text-gold-400 mb-2">20+</p>
                <p class="text-cream-100/80 text-sm uppercase tracking-wider">Years Experience</p>
            </div>
            <div>
                <p class="text-4xl md:text-5xl font-bold text-gold-400 mb-2">98%</p>
                <p class="text-cream-100/80 text-sm uppercase tracking-wider">Satisfaction Rate</p>
            </div>
        </div>
    </div>
</section>

<!-- Team -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="text-gold-600 font-semibold uppercase tracking-wider text-sm">Our Leadership</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-2 mb-3">Meet the Team Behind Your Journey</h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Experienced professionals dedicated to making your Umrah seamless</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $team = [
                    ['name' => 'Haji Siddique Ibrahim', 'role' => 'Founder & CEO', 'initials' => 'SI'],
                    ['name' => 'Abdul Rahman Siddique', 'role' => 'Operations Director', 'initials' => 'AR'],
                    ['name' => 'Fatima Al-Zahra', 'role' => 'Pilgrim Care Manager', 'initials' => 'FZ'],
                    ['name' => 'Yusuf Khan', 'role' => 'Makkah Coordinator', 'initials' => 'YK'],
                ];
            @endphp
            @foreach($team as $member)
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto rounded-full gradient-emerald flex items-center justify-center text-gold-400 text-2xl font-bold mb-4 shadow-lg">
                        {{ $member['initials'] }}
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">{{ $member['name'] }}</h3>
                    <p class="text-sm text-emerald-700 font-medium">{{ $member['role'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16 bg-cream-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Ready to Begin Your Sacred Journey?</h2>
        <p class="text-gray-600 mb-8 max-w-2xl mx-auto">Let us walk with you on the path to the Haram. Explore our carefully crafted Umrah packages today.</p>
        <a href="{{ route('packages.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 gradient-emerald text-cream-50 font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all">
            View Umrah Packages
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>
@endsection
