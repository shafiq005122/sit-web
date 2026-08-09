@extends('layouts.customer')
@section('title', 'My Dashboard')

@section('content')
<div class="space-y-6">
    <div class="gradient-emerald rounded-2xl p-6 text-white">
        <h2 class="text-xl font-bold">Welcome, {{ $customer?->name ?? auth('customer')->user()->name }}</h2>
        <p class="text-cream-200/80 text-sm mt-1">Manage your Umrah bookings and profile from here.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-xl p-5 border border-gray-100">
            <p class="text-2xl font-bold text-emerald-700">{{ $bookings->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Bookings</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100">
            <p class="text-2xl font-bold text-gold-600">{{ $bookings->where('status', 'pending')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Pending</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100">
            <p class="text-2xl font-bold text-emerald-700">{{ $bookings->where('status', 'confirmed')->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Confirmed</p>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-bold text-gray-800">Recent Bookings</h3>
            <a href="{{ route('customer.bookings') }}" class="text-sm text-emerald-600 font-medium hover:text-emerald-700">View All</a>
        </div>
        @if($bookings->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500">
                        <th class="px-6 py-3 font-medium">Reference</th>
                        <th class="px-6 py-3 font-medium">Package</th>
                        <th class="px-6 py-3 font-medium">Total</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr class="border-t border-gray-100 hover:bg-gray-50">
                        <td class="px-6 py-3 font-mono text-emerald-700">{{ $booking->booking_reference }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->package?->title ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">PKR {{ number_format($booking->total_amount ?? 0) }}</td>
                        <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs {{ $booking->status === 'confirmed' ? 'bg-emerald-100 text-emerald-700' : 'bg-gold-100 text-gold-700' }}">{{ ucfirst($booking->status) }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="p-12 text-center text-gray-400">
            <p>No bookings yet.</p>
            <a href="{{ route('packages') }}" class="inline-block mt-4 px-6 py-2.5 bg-emerald-700 text-white font-medium rounded-lg hover:bg-emerald-600 transition">Browse Packages</a>
        </div>
        @endif
    </div>
</div>
@endsection
