@extends('layouts.admin')
@section('title', 'Groups')
@section('page-title', 'Manage Departure Groups')

@section('content')
<div class="space-y-6">
    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
        @if($groups->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500">
                        <th class="px-6 py-3 font-medium">Group Code</th>
                        <th class="px-6 py-3 font-medium">Package</th>
                        <th class="px-6 py-3 font-medium">Departure</th>
                        <th class="px-6 py-3 font-medium">Return</th>
                        <th class="px-6 py-3 font-medium">Total Seats</th>
                        <th class="px-6 py-3 font-medium">Available</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groups as $group)
                    <tr class="border-t border-gray-100 hover:bg-gray-50">
                        <td class="px-6 py-3 font-mono text-emerald-700">{{ $group->group_code }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $group->package?->title ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $group->departure_date?->format('d M Y') }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $group->return_date?->format('d M Y') }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $group->total_seats }}</td>
                        <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs {{ $group->available_seats > 10 ? 'bg-emerald-100 text-emerald-700' : 'bg-gold-100 text-gold-700' }}">{{ $group->available_seats }}</span></td>
                        <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs {{ $group->status === 'open' ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-600' }}">{{ ucfirst($group->status) }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $groups->links() }}
        @else
        <div class="p-12 text-center text-gray-400">No departure groups found.</div>
        @endif
    </div>
</div>
@endsection
