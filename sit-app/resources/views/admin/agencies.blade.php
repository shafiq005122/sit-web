@extends('layouts.admin')
@section('title', 'Agencies')
@section('page-title', 'Manage Agencies')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
        @if($agencies->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500">
                        <th class="px-6 py-3 font-medium">Agency Name</th>
                        <th class="px-6 py-3 font-medium">Owner</th>
                        <th class="px-6 py-3 font-medium">Email</th>
                        <th class="px-6 py-3 font-medium">City</th>
                        <th class="px-6 py-3 font-medium">Tier</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agencies as $agency)
                    <tr class="border-t border-gray-100 hover:bg-gray-50">
                        <td class="px-6 py-3 font-medium text-emerald-700">{{ $agency->agency_name }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $agency->owner_name }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $agency->email }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $agency->city ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $agency->tier?->name ?? 'Standard' }}</td>
                        <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs {{ $agency->status === 'approved' ? 'bg-emerald-100 text-emerald-700' : ($agency->status === 'pending' ? 'bg-gold-100 text-gold-700' : 'bg-red-100 text-red-700') }}">{{ ucfirst($agency->status) }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $agencies->links() }}
        @else
        <div class="p-12 text-center text-gray-400">No agencies registered.</div>
        @endif
    </div>
</div>
@endsection
