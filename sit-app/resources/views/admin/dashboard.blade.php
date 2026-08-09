@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Stats Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-5 border border-gray-100 card">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-lg bg-emerald-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['total_bookings'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Bookings</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100 card">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-lg bg-gold-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-gold-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['pending_bookings'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Pending Bookings</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100 card">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-lg bg-emerald-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['confirmed_bookings'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Confirmed Bookings</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100 card">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-lg bg-emerald-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['total_passengers'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Passengers</p>
        </div>
    </div>

    <!-- Second Row -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-5 border border-gray-100 card">
            <p class="text-2xl font-bold text-gray-800">{{ $stats['total_packages'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Packages</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100 card">
            <p class="text-2xl font-bold text-gray-800">{{ $stats['total_groups'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Departure Groups</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100 card">
            <p class="text-2xl font-bold text-gray-800">{{ $stats['total_agencies'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Registered Agencies</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100 card">
            <p class="text-2xl font-bold text-gray-800">{{ $stats['total_customers'] }}</p>
            <p class="text-xs text-gray-500 mt-1">Customers</p>
        </div>
    </div>

    <!-- Revenue & Seats -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl p-6 border border-gray-100">
            <h3 class="text-sm font-medium text-gray-500 mb-4">Revenue Overview</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                    <span class="text-sm text-gray-600">Total Revenue</span>
                    <span class="text-lg font-bold text-emerald-700">PKR {{ number_format($stats['revenue']) }}</span>
                </div>
                <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                    <span class="text-sm text-gray-600">Collected</span>
                    <span class="text-lg font-bold text-emerald-700">PKR {{ number_format($stats['collected']) }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Outstanding</span>
                    <span class="text-lg font-bold text-gold-600">PKR {{ number_format($stats['outstanding']) }}</span>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-6 border border-gray-100">
            <h3 class="text-sm font-medium text-gray-500 mb-4">Seat Inventory</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                    <span class="text-sm text-gray-600">Total Seats</span>
                    <span class="text-lg font-bold text-gray-800">{{ $stats['total_seats'] }}</span>
                </div>
                <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                    <span class="text-sm text-gray-600">Available</span>
                    <span class="text-lg font-bold text-emerald-700">{{ $stats['available_seats'] }}</span>
                </div>
                <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                    <span class="text-sm text-gray-600">Held</span>
                    <span class="text-lg font-bold text-gold-600">{{ $stats['held_seats'] }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Confirmed</span>
                    <span class="text-lg font-bold text-gray-800">{{ $stats['confirmed_seats'] }}</span>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-6 border border-gray-100">
            <h3 class="text-sm font-medium text-gray-500 mb-4">Booking Sources</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                    <span class="text-sm text-gray-600">B2C (Direct)</span>
                    <span class="text-lg font-bold text-emerald-700">{{ $stats['b2c_bookings'] }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">B2B (Agent)</span>
                    <span class="text-lg font-bold text-gold-600">{{ $stats['b2b_bookings'] }}</span>
                </div>
            </div>
            @if($stats['pending_agencies'] > 0)
            <div class="mt-4 p-3 bg-gold-50 rounded-lg">
                <p class="text-sm text-gold-700"><span class="font-bold">{{ $stats['pending_agencies'] }}</span> agency applications pending approval</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Recent Bookings -->
    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-bold text-gray-800">Recent Bookings</h3>
            <a href="{{ route('admin.bookings') }}" class="text-sm text-emerald-600 font-medium hover:text-emerald-700">View All</a>
        </div>
        @if($recentBookings->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500">
                        <th class="px-6 py-3 font-medium">Reference</th>
                        <th class="px-6 py-3 font-medium">Customer</th>
                        <th class="px-6 py-3 font-medium">Agency</th>
                        <th class="px-6 py-3 font-medium">Package</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentBookings as $booking)
                    <tr class="border-t border-gray-100 hover:bg-gray-50">
                        <td class="px-6 py-3 font-mono text-emerald-700">{{ $booking->booking_reference }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->customer?->name ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->agency?->agency_name ?? 'Direct' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $booking->package?->title ?? '—' }}</td>
                        <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs {{ $booking->status === 'confirmed' ? 'bg-emerald-100 text-emerald-700' : ($booking->status === 'pending' ? 'bg-gold-100 text-gold-700' : 'bg-gray-100 text-gray-600') }}">{{ ucfirst($booking->status) }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="p-12 text-center text-gray-400">No bookings yet.</div>
        @endif
    </div>

    @if($recentAgencies->count() > 0)
    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-bold text-gray-800">Pending Agency Approvals</h3>
            <a href="{{ route('admin.agencies') }}" class="text-sm text-emerald-600 font-medium hover:text-emerald-700">View All</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500">
                        <th class="px-6 py-3 font-medium">Agency Name</th>
                        <th class="px-6 py-3 font-medium">Owner</th>
                        <th class="px-6 py-3 font-medium">Email</th>
                        <th class="px-6 py-3 font-medium">City</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentAgencies as $agency)
                    <tr class="border-t border-gray-100 hover:bg-gray-50">
                        <td class="px-6 py-3 font-medium text-gray-800">{{ $agency->agency_name }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $agency->owner_name }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $agency->email }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $agency->city ?? '—' }}</td>
                        <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs bg-gold-100 text-gold-700">Pending</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection
