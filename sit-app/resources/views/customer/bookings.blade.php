@extends('layouts.customer')
@section('title', 'My Bookings')

@section('content')
<div class="space-y-6">
    <h2 class="text-xl font-bold text-gray-800">My Bookings</h2>
    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
        @if($bookings->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500">
                        <th class="px-6 py-3 font-medium">Reference</th>
                        <th class="px-6 py-3 font-medium">Package</th>
                        <th class="px-6 py-3 font-medium">Departure</th>
                        <th class="px-6 py-3 font-medium">Total</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                        <th class="px-6 py-3 font-medium"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr class="border-t border-gray-100 hover:bg-gray-50">
                        <td class="px-6 py-3 font-mono text-emerald-700">{{ $booking->booking_reference }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->package?->title ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->departureGroup?->departure_date?->format('d M Y') ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">PKR {{ number_format($booking->total_amount ?? 0) }}</td>
                        <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs {{ $booking->status === 'confirmed' ? 'bg-emerald-100 text-emerald-700' : 'bg-gold-100 text-gold-700' }}">{{ ucfirst($booking->status) }}</span></td>
                        <td class="px-6 py-3"><a href="{{ route('customer.bookings.show', $booking->booking_reference) }}" class="text-emerald-600 font-medium hover:text-emerald-700">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $bookings->links() }}
        @else
        <div class="p-12 text-center text-gray-400">
            <p>No bookings yet.</p>
            <a href="{{ route('packages') }}" class="inline-block mt-4 px-6 py-2.5 bg-emerald-700 text-white font-medium rounded-lg hover:bg-emerald-600 transition">Browse Packages</a>
        </div>
        @endif
    </div>
</div>
@endsection
