@extends('layouts.admin')
@section('title', 'Payments')
@section('page-title', 'All Payments')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
        @if($payments->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500">
                        <th class="px-6 py-3 font-medium">Date</th>
                        <th class="px-6 py-3 font-medium">Booking</th>
                        <th class="px-6 py-3 font-medium">Agency</th>
                        <th class="px-6 py-3 font-medium">Amount</th>
                        <th class="px-6 py-3 font-medium">Method</th>
                        <th class="px-6 py-3 font-medium">Type</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                    <tr class="border-t border-gray-100 hover:bg-gray-50">
                        <td class="px-6 py-3 text-gray-700">{{ $payment->created_at?->format('d M Y') }}</td>
                        <td class="px-6 py-3 font-mono text-emerald-700">{{ $payment->booking?->booking_reference ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $payment->agency?->agency_name ?? 'Direct' }}</td>
                        <td class="px-6 py-3 font-medium text-gray-800">PKR {{ number_format($payment->amount ?? 0) }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ ucfirst($payment->payment_method ?? '—') }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ ucfirst($payment->payment_type ?? '—') }}</td>
                        <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs {{ $payment->status === 'completed' ? 'bg-emerald-100 text-emerald-700' : ($payment->status === 'pending' ? 'bg-gold-100 text-gold-700' : 'bg-gray-100 text-gray-600') }}">{{ ucfirst($payment->status ?? 'pending') }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $payments->links() }}
        @else
        <div class="p-12 text-center text-gray-400">No payments recorded.</div>
        @endif
    </div>
</div>
@endsection
