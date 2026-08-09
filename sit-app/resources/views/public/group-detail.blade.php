@extends('layouts.public')
@section('title', 'Group Details')

@section('content')
<div class="bg-emerald-900 text-white py-12 relative overflow-hidden">
    <div class="islamic-pattern absolute inset-0 opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm text-cream-200/60 mb-4">
            <a href="{{ route('home') }}" class="hover:text-gold-300">Home</a> /
            <a href="{{ route('groups') }}" class="hover:text-gold-300">Groups</a> /
            <span class="text-gold-300">{{ $group->group_code }}</span>
        </nav>
        <h1 class="text-3xl font-bold">{{ $group->package?->title ?? 'Umrah Package' }}</h1>
        <p class="text-gold-300 font-mono mt-2">{{ $group->group_code }}</p>
    </div>
</div>

<section class="py-12 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-emerald-800 mb-6">Group Details</h2>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide">Departure Date</p>
                        <p class="text-lg font-semibold text-gray-800 mt-1">{{ $group->departure_date?->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide">Return Date</p>
                        <p class="text-lg font-semibold text-gray-800 mt-1">{{ $group->return_date?->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide">Departure City</p>
                        <p class="text-lg font-semibold text-gray-800 mt-1">{{ $group->departure_city ?? 'Flexible' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide">Airline</p>
                        <p class="text-lg font-semibold text-gray-800 mt-1">{{ $group->airline ?? 'TBA' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide">Status</p>
                        <span class="inline-block mt-1 px-3 py-1 rounded-full text-xs font-medium {{ $group->status === 'open' ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-600' }}">{{ ucfirst($group->status) }}</span>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wide">Total Nights</p>
                        <p class="text-lg font-semibold text-gray-800 mt-1">{{ $group->package?->total_nights ?? '—' }}</p>
                    </div>
                </div>
            </div>

            @if($group->flights && $group->flights->count() > 0)
            <div class="bg-white rounded-2xl p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-emerald-800 mb-4">Flight Information</h2>
                <div class="space-y-4">
                    @foreach($group->flights as $flight)
                    <div class="flex items-center gap-4 p-4 bg-cream-50 rounded-xl">
                        <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 16V14a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 14v2a2 2 0 002 2h14a2 2 0 002-2z"/></svg>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-gray-800">{{ $flight->flight_number ?? 'Flight' }}</p>
                            <p class="text-sm text-gray-500">{{ $flight->origin ?? '' }} → {{ $flight->destination ?? '' }} · {{ $flight->departure_time?->format('d M, H:i') ?? '' }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="bg-white rounded-2xl p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-emerald-800 mb-4">Seat Availability</h2>
                <div class="grid grid-cols-3 gap-4">
                    <div class="text-center p-4 bg-emerald-50 rounded-xl">
                        <p class="text-2xl font-bold text-emerald-700">{{ $group->total_seats }}</p>
                        <p class="text-xs text-gray-500 mt-1">Total Seats</p>
                    </div>
                    <div class="text-center p-4 bg-gold-50 rounded-xl">
                        <p class="text-2xl font-bold text-gold-600">{{ $group->available_seats }}</p>
                        <p class="text-xs text-gray-500 mt-1">Available</p>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-xl">
                        <p class="text-2xl font-bold text-gray-600">{{ $group->total_seats - $group->available_seats }}</p>
                        <p class="text-xs text-gray-500 mt-1">Booked</p>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                        <div class="gradient-emerald h-3 rounded-full" style="width: {{ $group->total_seats > 0 ? (($group->total_seats - $group->available_seats) / $group->total_seats * 100) : 0 }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="bg-white rounded-2xl p-6 border border-gray-100 sticky top-24">
                <h3 class="text-lg font-bold text-emerald-800 mb-4">Reserve Your Seat</h3>
                <p class="text-sm text-gray-500 mb-6">Secure your spot in this departure group. Seats are limited.</p>
                @if($group->available_seats > 0 && $group->status === 'open')
                @if(auth('customer')->check())
                <a href="#" class="block text-center px-6 py-3 bg-gold-500 text-emerald-900 font-bold rounded-xl hover:bg-gold-400 transition shadow-lg">Book Now</a>
                @else
                <a href="{{ route('customer.login') }}" class="block text-center px-6 py-3 bg-gold-500 text-emerald-900 font-bold rounded-xl hover:bg-gold-400 transition shadow-lg">Login to Book</a>
                @endif
                @else
                <p class="text-center text-sm text-red-500 font-medium py-3">This group is fully booked.</p>
                @endif
                <div class="mt-6 pt-6 border-t border-gray-100 space-y-2 text-sm text-gray-600">
                    <p class="flex items-center gap-2"><svg class="w-4 h-4 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Seats held for 24 hours</p>
                    <p class="flex items-center gap-2"><svg class="w-4 h-4 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg> Full refund if cancelled</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
