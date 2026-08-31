@extends('layouts.admin')
@section('title', 'Packages')
@section('page-title', 'Manage Packages')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-sm text-gray-500">{{ $packages->total() }} packages total</p>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
        @if($packages->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-500">
                        <th class="px-6 py-3 font-medium">Title</th>
                        <th class="px-6 py-3 font-medium">Nights</th>
                        <th class="px-6 py-3 font-medium">Departure City</th>
                        <th class="px-6 py-3 font-medium">Airline</th>
                        <th class="px-6 py-3 font-medium">Groups</th>
                        <th class="px-6 py-3 font-medium">Visibility</th>
                        <th class="px-6 py-3 font-medium">Featured</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $package)
                    <tr class="border-t border-gray-100 hover:bg-gray-50">
                        <td class="px-6 py-3 font-medium text-emerald-700">{{ $package->title }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $package->total_nights }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $package->departure_city ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $package->airline ?? '—' }}</td>
                        <td class="px-6 py-3 text-gray-700">{{ $package->departure_groups_count }}</td>
                        <td class="px-6 py-3">
                            <span class="px-2 py-1 rounded-full text-xs {{ $package->b2c_visible ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-500' }}">{{ $package->b2c_visible ? 'B2C' : '' }}</span>
                            <span class="px-2 py-1 rounded-full text-xs {{ $package->b2b_visible ? 'bg-gold-100 text-gold-700' : 'bg-gray-100 text-gray-500' }}">{{ $package->b2b_visible ? 'B2B' : '' }}</span>
                        </td>
                        <td class="px-6 py-3">{{ $package->is_featured ? '<span class="text-gold-500">&#9733;</span>' : '—' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $packages->links() }}
        @else
        <div class="p-12 text-center text-gray-400">No packages found.</div>
        @endif
    </div>
</div>
@endsection
