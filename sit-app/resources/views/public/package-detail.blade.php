@extends('layouts.public')
@section('title', 'Package Details')

@section('content')
<div class="bg-emerald-900 text-white py-12 relative overflow-hidden">
    <div class="islamic-pattern absolute inset-0 opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-sm text-cream-200/60 mb-4">
            <a href="{{ route('home') }}" class="hover:text-gold-300">Home</a> /
            <a href="{{ route('packages') }}" class="hover:text-gold-300">Packages</a> /
            <span class="text-gold-300">{{ $package->title }}</span>
        </nav>
        <h1 class="text-3xl lg:text-4xl font-bold">{{ $package->title }}</h1>
        <p class="text-cream-200/80 mt-2">{{ $package->total_nights }} Nights · {{ $package->makkah_nights }} Makkah · {{ $package->madinah_nights }} Madinah</p>
    </div>
</div>

<section class="py-12 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-2xl p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-emerald-800 mb-4">Package Overview</h2>
                <p class="text-gray-600 leading-relaxed">{{ $package->description ?? 'A premium Umrah package designed for a comfortable and spiritually fulfilling journey.' }}</p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                    <div class="text-center p-4 bg-emerald-50 rounded-xl">
                        <p class="text-2xl font-bold text-emerald-700">{{ $package->total_nights }}</p>
                        <p class="text-xs text-gray-500 mt-1">Total Nights</p>
                    </div>
                    <div class="text-center p-4 bg-emerald-50 rounded-xl">
                        <p class="text-2xl font-bold text-emerald-700">{{ $package->makkah_nights }}</p>
                        <p class="text-xs text-gray-500 mt-1">Makkah</p>
                    </div>
                    <div class="text-center p-4 bg-emerald-50 rounded-xl">
                        <p class="text-2xl font-bold text-emerald-700">{{ $package->madinah_nights }}</p>
                        <p class="text-xs text-gray-500 mt-1">Madinah</p>
                    </div>
                    <div class="text-center p-4 bg-emerald-50 rounded-xl">
                        <p class="text-2xl font-bold text-emerald-700">{{ $package->haram_distance ?? '—' }}</p>
                        <p class="text-xs text-gray-500 mt-1">Haram Distance</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-emerald-800 mb-4">Package Features</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="flex items-center gap-3 p-3 bg-cream-50 rounded-lg">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-sm text-gray-700">Departure: {{ $package->departure_city ?? 'Flexible' }}</span>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-cream-50 rounded-lg">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-sm text-gray-700">Airline: {{ $package->airline ?? 'To be confirmed' }}</span>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-cream-50 rounded-lg">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-sm text-gray-700">Hotel: {{ $package->hotel_category ?? '4 Star' }}</span>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-cream-50 rounded-lg">
                        <svg class="w-5 h-5 {{ $package->visa_included ? 'text-emerald-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $package->visa_included ? 'M5 13l4 4L19 7' : 'M6 18L18 6M6 6l12 12' }}"/></svg>
                        <span class="text-sm text-gray-700">Visa {{ $package->visa_included ? 'Included' : 'Not Included' }}</span>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-cream-50 rounded-lg">
                        <svg class="w-5 h-5 {{ $package->direct_flight ? 'text-emerald-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $package->direct_flight ? 'M5 13l4 4L19 7' : 'M6 18L18 6M6 6l12 12' }}"/></svg>
                        <span class="text-sm text-gray-700">{{ $package->direct_flight ? 'Direct Flight' : 'Connecting Flight' }}</span>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-cream-50 rounded-lg">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span class="text-sm text-gray-700">Transport Included</span>
                    </div>
                </div>
            </div>

            @if($groups->count() > 0)
            <div class="bg-white rounded-2xl p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-emerald-800 mb-4">Available Departure Groups</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left text-gray-500 border-b border-gray-200">
                                <th class="pb-3 font-medium">Group Code</th>
                                <th class="pb-3 font-medium">Departure</th>
                                <th class="pb-3 font-medium">Return</th>
                                <th class="pb-3 font-medium">Seats Available</th>
                                <th class="pb-3 font-medium"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groups as $group)
                            <tr class="border-b border-gray-100">
                                <td class="py-3 font-mono text-emerald-700">{{ $group->group_code }}</td>
                                <td class="py-3 text-gray-700">{{ $group->departure_date?->format('d M Y') }}</td>
                                <td class="py-3 text-gray-700">{{ $group->return_date?->format('d M Y') }}</td>
                                <td class="py-3">
                                    <span class="px-2 py-1 rounded-full text-xs {{ $group->available_seats > 10 ? 'bg-emerald-100 text-emerald-700' : 'bg-gold-100 text-gold-700' }}">{{ $group->available_seats }} / {{ $group->total_seats }}</span>
                                </td>
                                <td class="py-3">
                                    <a href="{{ route('groups.show', $group->id) }}" class="text-emerald-600 font-medium hover:text-emerald-700">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-2xl p-6 border border-gray-100 sticky top-24">
                <h3 class="text-lg font-bold text-emerald-800 mb-4">Book This Package</h3>
                <p class="text-sm text-gray-500 mb-4">Select a departure group and reserve your seat today.</p>
                @if($groups->count() > 0)
                <a href="{{ route('groups.show', $groups->first()->id) }}" class="block text-center px-6 py-3 bg-gold-500 text-emerald-900 font-bold rounded-xl hover:bg-gold-400 transition shadow-lg">Book Now</a>
                @else
                <p class="text-sm text-gray-400 text-center py-3">No groups currently available.</p>
                @endif
                <div class="mt-6 space-y-3 text-sm">
                    <div class="flex items-center gap-2 text-gray-600"><svg class="w-4 h-4 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Free cancellation up to 14 days</div>
                    <div class="flex items-center gap-2 text-gray-600"><svg class="w-4 h-4 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Secure online booking</div>
                    <div class="flex items-center gap-2 text-gray-600"><svg class="w-4 h-4 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> 24/7 customer support</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
