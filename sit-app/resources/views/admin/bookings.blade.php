@extends('layouts.admin')
@section('title', 'Bookings')
@section('page-title', 'All Bookings')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
        @if($bookings->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500">
                        <th class="px-6 py-3 font-medium">Reference</th>
                        <th class="px-6 py-3 font-medium">Customer</th>
                        <th class="px-6 py-3 font-medium">Agency</th>
                        <th class="px-6 py-3 font-medium">Package</th>
                        <th class="px-6 py-3 font-medium">Group</th>
                        <th class="px-6 py-3 font-medium">Total</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr class="border-t border-gray-100 hover:bg-gray-50">
                        <td class="px-6 py-3 font-mono text-emerald-700">{{ $booking->booking_reference }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->customer?->name ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->agency?->agency_name ?? 'Direct' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->package?->title ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->departureGroup?->group_code ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">PKR {{ number_format($booking->total_amount ?? 0) }}</td>
                        <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs {{ $booking->status === 'confirmed' ? 'bg-emerald-100 text-emerald-700' : ($booking->status === 'pending' ? 'bg-gold-100 text-gold-700' : ($booking->status === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-600')) }}">{{ ucfirst($booking->status) }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $bookings->links() }}
        @else
        <div class="p-12 text-center text-gray-400">No bookings found.</div>
        @endif
    </div>
</div>
@endsection
