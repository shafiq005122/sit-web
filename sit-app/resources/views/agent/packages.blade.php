@extends('layouts.agent')
@section('title', 'B2B Packages')
@section('page-title', 'Available Packages')

@section('content')
<div class="space-y-6">
    @if($packages->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($packages as $package)
        <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 card-hover">
            <div class="h-32 gradient-emerald relative">
                <div class="islamic-pattern absolute inset-0 opacity-20"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="arabic text-4xl text-gold-400/50">بسم الله</span>
                </div>
            </div>
            <div class="p-5">
                <h3 class="text-lg font-bold text-emerald-800">{{ $package->title }}</h3>
                <p class="text-sm text-gray-500 mt-1">{{ $package->total_nights }} Nights · {{ $package->departure_city ?? 'Flexible' }}</p>
                <div class="flex items-center gap-4 mt-3 text-xs text-gray-600">
                    <span>{{ $package->makkah_nights }} Makkah</span>
                    <span>{{ $package->madinah_nights }} Madinah</span>
                    <span>{{ $package->hotel_category ?? '4★' }}</span>
                </div>
                <a href="#" class="mt-4 block text-center px-4 py-2 bg-emerald-50 text-emerald-700 font-medium rounded-lg hover:bg-emerald-100 transition">View Details</a>
            </div>
        </div>
        @endforeach
    </div>
    {{ $packages->links() }}
    @else
    <div class="bg-white rounded-xl p-12 text-center text-gray-400 border border-gray-100">No B2B packages available.</div>
    @endif
</div>
@endsection
