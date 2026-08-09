@extends('layouts.agent')
@section('title', 'Wallet')
@section('page-title', 'Wallet & Transactions')

@section('content')
<div class="space-y-6">
    @if($wallet)
    <div class="gradient-emerald rounded-xl p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-cream-200/80">Current Balance</p>
                <p class="text-3xl font-bold mt-1">PKR {{ number_format($wallet->balance) }}</p>
            </div>
            <div class="w-14 h-14 rounded-full bg-gold-500/20 flex items-center justify-center">
                <svg class="w-7 h-7 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
            </div>
        </div>
    </div>
    @else
    <div class="bg-gold-50 rounded-xl p-6 text-center text-gold-700">Wallet not initialized. Contact admin.</div>
    @endif

    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h3 class="font-bold text-gray-800">Transaction History</h3>
        </div>
        @if($transactions->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500">
                        <th class="px-6 py-3 font-medium">Date</th>
                        <th class="px-6 py-3 font-medium">Description</th>
                        <th class="px-6 py-3 font-medium">Type</th>
                        <th class="px-6 py-3 font-medium">Amount</th>
                        <th class="px-6 py-3 font-medium">Balance After</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $txn)
                    <tr class="border-t border-gray-100 hover:bg-gray-50">
                        <td class="px-6 py-3 text-gray-700">{{ $txn->created_at?->format('d M Y') }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $txn->description ?? '—' }}</td>
                        <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs {{ $txn->type === 'credit' ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">{{ ucfirst($txn->type) }}</span></td>
                        <td class="px-6 py-3 font-medium {{ $txn->type === 'credit' ? 'text-emerald-700' : 'text-red-600' }}">{{ $txn->type === 'credit' ? '+' : '-' }} PKR {{ number_format($txn->amount) }}</td>
                        <td class="px-6 py-3 text-gray-700">PKR {{ number_format($txn->balance_after ?? 0) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $transactions->links() }}
        @else
        <div class="p-12 text-center text-gray-400">No transactions yet.</div>
        @endif
    </div>
</div>
@endsection
