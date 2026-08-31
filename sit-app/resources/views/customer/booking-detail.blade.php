@extends('layouts.customer')
@section('title', 'Booking Details')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-2xl p-6 border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Booking {{ $booking->booking_reference }}</h2>
                <p class="text-sm text-gray-500 mt-1">Created {{ $booking->created_at?->format('d M Y') }}</p>
            </div>
            <span class="px-3 py-1.5 rounded-full text-sm font-medium {{ $booking->status === 'confirmed' ? 'bg-emerald-100 text-emerald-700' : 'bg-gold-100 text-gold-700' }}">{{ ucfirst($booking->status) }}</span>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">Package</p>
                <p class="text-sm font-medium text-gray-800 mt-1">{{ $booking->package?->title ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">Group</p>
                <p class="text-sm font-medium text-gray-800 mt-1">{{ $booking->departureGroup?->group_code ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">Departure</p>
                <p class="text-sm font-medium text-gray-800 mt-1">{{ $booking->departureGroup?->departure_date?->format('d M Y') ?? '—' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">Total Amount</p>
                <p class="text-sm font-bold text-emerald-700 mt-1">PKR {{ number_format($booking->total_amount ?? 0) }}</p>
            </div>
        </div>
    </div>

    @if($booking->passengers && $booking->passengers->count() > 0)
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h3 class="font-bold text-gray-800">Passengers</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500">
                        <th class="px-6 py-3 font-medium">Name</th>
                        <th class="px-6 py-3 font-medium">Passport No</th>
                        <th class="px-6 py-3 font-medium">Gender</th>
                        <th class="px-6 py-3 font-medium">Room Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($booking->passengers as $passenger)
                    <tr class="border-t border-gray-100">
                        <td class="px-6 py-3 text-gray-700">{{ $passenger->full_name }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $passenger->passport_number ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ ucfirst($passenger->gender ?? '—') }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $passenger->room_type ?? '—' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    @if($booking->payments && $booking->payments->count() > 0)
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h3 class="font-bold text-gray-800">Payment History</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500">
                        <th class="px-6 py-3 font-medium">Date</th>
                        <th class="px-6 py-3 font-medium">Amount</th>
                        <th class="px-6 py-3 font-medium">Method</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($booking->payments as $payment)
                    <tr class="border-t border-gray-100">
                        <td class="px-6 py-3 text-gray-700">{{ $payment->created_at?->format('d M Y') }}</td>
                        <td class="px-6 py-3 font-medium text-gray-800">PKR {{ number_format($payment->amount ?? 0) }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ ucfirst($payment->payment_method ?? '—') }}</td>
                        <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs {{ $payment->status === 'completed' ? 'bg-emerald-100 text-emerald-700' : 'bg-gold-100 text-gold-700' }}">{{ ucfirst($payment->status ?? 'pending') }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <div class="bg-white rounded-2xl p-6 border border-gray-100">
        <h3 class="font-bold text-gray-800 mb-4">Payment Summary</h3>
        <div class="space-y-3">
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <span class="text-sm text-gray-600">Total Amount</span>
                <span class="font-bold text-gray-800">PKR {{ number_format($booking->total_amount ?? 0) }}</span>
            </div>
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <span class="text-sm text-gray-600">Paid</span>
                <span class="font-bold text-emerald-700">PKR {{ number_format($booking->paid_amount ?? 0) }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-gray-600">Outstanding</span>
                <span class="font-bold text-gold-600">PKR {{ number_format($booking->outstanding_amount ?? 0) }}</span>
            </div>
        </div>
    </div>

    <a href="{{ route('customer.bookings') }}" class="inline-flex items-center gap-2 text-emerald-600 font-medium hover:text-emerald-700">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Back to Bookings
    </a>
</div>
@endsection
