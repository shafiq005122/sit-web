@extends('layouts.public')
@section('title', 'Departure Groups')

@section('content')
<div class="bg-emerald-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl lg:text-4xl font-bold">Departure Groups</h1>
        <p class="text-cream-200/80 mt-2">Browse all upcoming Umrah departure groups and reserve your seat.</p>
    </div>
</div>

<section class="py-12 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($groups->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($groups as $group)
            <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 card-hover">
                <div class="gradient-emerald p-6 text-white relative">
                    <div class="islamic-pattern absolute inset-0 opacity-20"></div>
                    <div class="relative">
                        <span class="text-xs text-gold-300 font-mono">{{ $group->group_code }}</span>
                        <h3 class="text-lg font-bold mt-1">{{ $group->package?->title ?? 'Umrah Package' }}</h3>
                        <p class="text-sm text-cream-200/80 mt-1">{{ $group->departure_city ?? 'Flexible' }}</p>
                    </div>
                </div>
                <div class="p-6 space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Departure</span>
                        <span class="font-medium text-gray-800">{{ $group->departure_date?->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Return</span>
                        <span class="font-medium text-gray-800">{{ $group->return_date?->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Airline</span>
                        <span class="font-medium text-gray-800">{{ $group->airline ?? 'TBA' }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Available Seats</span>
                        <span class="px-2 py-0.5 rounded-full text-xs {{ $group->available_seats > 10 ? 'bg-emerald-100 text-emerald-700' : 'bg-gold-100 text-gold-700' }}">{{ $group->available_seats }} / {{ $group->total_seats }}</span>
                    </div>
                    <a href="{{ route('groups.show', $group->id) }}" class="block text-center mt-4 px-4 py-2.5 bg-emerald-50 text-emerald-700 font-medium rounded-lg hover:bg-emerald-100 transition">View Details</a>
                </div>
            </div>
            @endforeach
        </div>
        {{ $groups->links() }}
        @else
        <div class="text-center py-20 text-gray-400">
            <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <p class="text-lg">No departure groups available at the moment.</p>
            <p class="text-sm mt-2">Please check back soon or contact us for upcoming departures.</p>
        </div>
        @endif
    </div>
</section>
@endsection
