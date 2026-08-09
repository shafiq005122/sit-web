@extends('layouts.admin')
@section('title', 'Customers')
@section('page-title', 'Manage Customers')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
        @if($customers->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500">
                        <th class="px-6 py-3 font-medium">Name</th>
                        <th class="px-6 py-3 font-medium">Email</th>
                        <th class="px-6 py-3 font-medium">Mobile</th>
                        <th class="px-6 py-3 font-medium">Source</th>
                        <th class="px-6 py-3 font-medium">Registered</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr class="border-t border-gray-100 hover:bg-gray-50">
                        <td class="px-6 py-3 font-medium text-emerald-700">{{ $customer->name }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $customer->email ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $customer->mobile ?? '—' }}</td>
                        <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs {{ $customer->source_channel === 'b2c' ? 'bg-emerald-100 text-emerald-700' : 'bg-gold-100 text-gold-700' }}">{{ strtoupper($customer->source_channel ?? 'B2C') }}</span></td>
                        <td class="px-6 py-3 text-gray-700">{{ $customer->created_at?->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $customers->links() }}
        @else
        <div class="p-12 text-center text-gray-400">No customers registered.</div>
        @endif
    </div>
</div>
@endsection
