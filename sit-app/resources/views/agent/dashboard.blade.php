@extends('layouts.agent')
@section('title', 'Agent Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-5 border border-gray-100">
            <p class="text-2xl font-bold text-emerald-700">{{ $stats['total_bookings'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Bookings</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100">
            <p class="text-2xl font-bold text-gold-600">{{ $stats['pending_bookings'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Pending</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100">
            <p class="text-2xl font-bold text-emerald-700">{{ $stats['confirmed_bookings'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Confirmed</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100">
            <p class="text-2xl font-bold text-gold-600">PKR {{ number_format($stats['outstanding']) }}</p>
            <p class="text-xs text-gray-500 mt-1">Outstanding</p>
        </div>
    </div>

    @if($wallet)
    <div class="gradient-emerald rounded-xl p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-cream-200/80">Wallet Balance</p>
                <p class="text-3xl font-bold mt-1">PKR {{ number_format($wallet->balance) }}</p>
            </div>
            <div class="w-14 h-14 rounded-full bg-gold-500/20 flex items-center justify-center">
                <svg class="w-7 h-7 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
            </div>
        </div>
        <a href="{{ route('agent.wallet') }}" class="inline-block mt-4 px-4 py-2 bg-gold-500 text-emerald-900 text-sm font-medium rounded-lg hover:bg-gold-400 transition">View Transactions</a>
    </div>
    @endif

    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-bold text-gray-800">Recent Bookings</h3>
            <a href="{{ route('agent.bookings') }}" class="text-sm text-emerald-600 font-medium hover:text-emerald-700">View All</a>
        </div>
        @if($bookings->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500">
                        <th class="px-6 py-3 font-medium">Reference</th>
                        <th class="px-6 py-3 font-medium">Customer</th>
                        <th class="px-6 py-3 font-medium">Package</th>
                        <th class="px-6 py-3 font-medium">Total</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr class="border-t border-gray-100 hover:bg-gray-50">
                        <td class="px-6 py-3 font-mono text-emerald-700">{{ $booking->booking_reference }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->customer?->name ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->package?->title ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">PKR {{ number_format($booking->total_amount ?? 0) }}</td>
                        <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs {{ $booking->status === 'confirmed' ? 'bg-emerald-100 text-emerald-700' : 'bg-gold-100 text-gold-700' }}">{{ ucfirst($booking->status) }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="p-12 text-center text-gray-400">No bookings yet. Browse packages to get started.</div>
        @endif
    </div>
</div>
@endsection
