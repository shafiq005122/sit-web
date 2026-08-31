@extends('layouts.agent')
@section('title', 'Departure Groups')
@section('page-title', 'Available Groups')

@section('content')
<div class="space-y-6">
    @if($groups->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($groups as $group)
        <div class="bg-white rounded-2xl overflow-hidden border border-gray-100">
            <div class="gradient-emerald p-5 text-white relative">
                <div class="islamic-pattern absolute inset-0 opacity-20"></div>
                <div class="relative">
                    <span class="text-xs text-gold-300 font-mono">{{ $group->group_code }}</span>
                    <h3 class="font-bold mt-1">{{ $group->package?->title ?? 'Umrah Package' }}</h3>
                </div>
            </div>
            <div class="p-5 space-y-2 text-sm">
                <div class="flex justify-between"><span class="text-gray-500">Departure</span><span class="font-medium text-gray-800">{{ $group->departure_date?->format('d M Y') }}</span></div>
                <div class="flex justify-between"><span class="text-gray-500">Return</span><span class="font-medium text-gray-800">{{ $group->return_date?->format('d M Y') }}</span></div>
                <div class="flex justify-between"><span class="text-gray-500">Available</span><span class="px-2 py-0.5 rounded-full text-xs {{ $group->available_seats > 10 ? 'bg-emerald-100 text-emerald-700' : 'bg-gold-100 text-gold-700' }}">{{ $group->available_seats }} / {{ $group->total_seats }}</span></div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $groups->links() }}
    @else
    <div class="bg-white rounded-xl p-12 text-center text-gray-400 border border-gray-100">No departure groups available.</div>
    @endif
</div>
@endsection
