@extends('layouts.public')

@section('title', 'Umrah Packages — Siddique Ibrahim Travel & Tours')

@section('content')
<!-- Hero -->
<section class="relative gradient-emerald text-cream-50 py-20 overflow-hidden">
    <div class="absolute inset-0 islamic-pattern"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="arabic text-3xl text-gold-300 mb-4">باقات العمرة</p>
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Umrah Packages</h1>
        <p class="text-lg text-cream-100/90 max-w-2xl mx-auto">Choose from our carefully curated range of Umrah packages, each designed for a comfortable and spiritually fulfilling journey.</p>
    </div>
</section>

<!-- Packages + Filter -->
<section class="py-16 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Filter Sidebar -->
            <aside class="lg:w-72 flex-shrink-0">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:sticky lg:top-24">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-bold text-gray-800">Filters</h3>
                        <a href="{{ route('packages.index') }}" class="text-xs text-emerald-600 hover:text-emerald-700 font-medium">Reset All</a>
                    </div>
                    <form action="{{ route('packages.index') }}" method="GET" class="space-y-6">
                        <!-- Search -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Search</label>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Package name..."
                                class="w-full px-3 py-2 rounded-lg border border-gray-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                        </div>

                        <!-- Duration -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Duration (Nights)</label>
                            <div class="space-y-2">
                                @php $durations = ['1-7' => '1 – 7 Nights', '8-14' => '8 – 14 Nights', '15-30' => '15 – 30 Nights']; @endphp
                                @foreach($durations as $value => $label)
                                    <label class="flex items-center gap-2 cursor-pointer hover:bg-cream-50 px-2 py-1.5 rounded-lg">
                                        <input type="checkbox" name="duration[]" value="{{ $value }}" {{ in_array($value, (array)request('duration', [])) ? 'checked' : '' }}
                                            class="rounded text-emerald-600 focus:ring-emerald-500">
                                        <span class="text-sm text-gray-600">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Departure City -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Departure City</label>
                            <select name="departure_city" class="w-full px-3 py-2 rounded-lg border border-gray-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                                <option value="">All Cities</option>
                                @php $cities = ['Karachi', 'Lahore', 'Islamabad', 'Peshawar', 'Multan', 'Faisalabad']; @endphp
                                @foreach($cities as $city)
                                    <option value="{{ $city }}" {{ request('departure_city') === $city ? 'selected' : '' }}>{{ $city }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Hotel Category -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Hotel Category</label>
                            <div class="space-y-2">
                                @php $categories = ['3' => '3 Star', '4' => '4 Star', '5' => '5 Star']; @endphp
                                @foreach($categories as $value => $label)
                                    <label class="flex items-center gap-2 cursor-pointer hover:bg-cream-50 px-2 py-1.5 rounded-lg">
                                        <input type="checkbox" name="hotel_category[]" value="{{ $value }}" {{ in_array($value, (array)request('hotel_category', [])) ? 'checked' : '' }}
                                            class="rounded text-emerald-600 focus:ring-emerald-500">
                                        <span class="text-sm text-gray-600">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Features -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Features</label>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 cursor-pointer hover:bg-cream-50 px-2 py-1.5 rounded-lg">
                                    <input type="checkbox" name="visa_included" value="1" {{ request('visa_included') ? 'checked' : '' }} class="rounded text-emerald-600 focus:ring-emerald-500">
                                    <span class="text-sm text-gray-600">Visa Included</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer hover:bg-cream-50 px-2 py-1.5 rounded-lg">
                                    <input type="checkbox" name="direct_flight" value="1" {{ request('direct_flight') ? 'checked' : '' }} class="rounded text-emerald-600 focus:ring-emerald-500">
                                    <span class="text-sm text-gray-600">Direct Flight</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer hover:bg-cream-50 px-2 py-1.5 rounded-lg">
                                    <input type="checkbox" name="is_featured" value="1" {{ request('is_featured') ? 'checked' : '' }} class="rounded text-emerald-600 focus:ring-emerald-500">
                                    <span class="text-sm text-gray-600">Featured Only</span>
                                </label>
                            </div>
                        </div>

                        <!-- Sort -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Sort By</label>
                            <select name="sort" class="w-full px-3 py-2 rounded-lg border border-gray-200 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                                <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Newest First</option>
                                <option value="duration_asc" {{ request('sort') === 'duration_asc' ? 'selected' : '' }}>Shortest Duration</option>
                                <option value="duration_desc" {{ request('sort') === 'duration_desc' ? 'selected' : '' }}>Longest Duration</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full py-2.5 gradient-emerald text-cream-50 font-semibold rounded-lg shadow-sm hover:shadow-md transition-all">
                            Apply Filters
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Packages Grid -->
            <div class="flex-1">
                <div class="flex items-center justify-between mb-6">
                    <p class="text-sm text-gray-500">
                        Showing <span class="font-semibold text-gray-800">{{ $packages->firstItem() ?? 0 }}</span>–<span class="font-semibold text-gray-800">{{ $packages->lastItem() ?? 0 }}</span>
                        of <span class="font-semibold text-gray-800">{{ $packages->total() }}</span> packages
                    </p>
                </div>

                @if($packages->isNotEmpty())
                    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-6">
                        @foreach($packages as $package)
                            <div class="bg-white rounded-2xl overflow-hidden card-hover shadow-sm border border-gray-100 flex flex-col">
                                <!-- Card Header -->
                                <div class="gradient-emerald p-5 relative islamic-pattern">
                                    <div class="relative flex items-start justify-between">
                                        <div>
                                            @if($package->is_featured)
                                                <span class="inline-block px-2.5 py-1 bg-gold-500 text-emerald-900 text-xs font-bold rounded-full mb-2">★ Featured</span>
                                            @endif
                                            <h3 class="text-lg font-bold text-cream-50 leading-tight">{{ $package->title }}</h3>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-2xl font-bold text-gold-400">{{ $package->total_nights }}</p>
                                            <p class="text-xs text-cream-100/70 uppercase">Nights</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Body -->
                                <div class="p-5 flex-1 flex flex-col">
                                    <div class="space-y-2.5 mb-4">
                                        <div class="flex items-center gap-2 text-sm text-gray-600">
                                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                            <span>{{ $package->departure_city }}</span>
                                        </div>
                                        <div class="flex items-center gap-2 text-sm text-gray-600">
                                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l7-7 3 3-7 7-3-3z M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/></svg>
                                            <span>{{ $package->airline }}</span>
                                        </div>
                                        <div class="flex items-center gap-2 text-sm text-gray-600">
                                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3"/></svg>
                                            <span>{{ $package->hotel_category }}★ Hotel</span>
                                        </div>
                                        <div class="flex items-center gap-2 text-sm text-gray-600">
                                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            <span>{{ $package->haram_distance }} from Haram</span>
                                        </div>
                                    </div>

                                    <!-- Night breakdown -->
                                    <div class="flex gap-2 mb-4">
                                        <div class="flex-1 bg-emerald-50 rounded-lg p-2 text-center">
                                            <p class="text-xs text-gray-500">Makkah</p>
                                            <p class="text-sm font-bold text-emerald-800">{{ $package->makkah_nights }}N</p>
                                        </div>
                                        <div class="flex-1 bg-gold-50 rounded-lg p-2 text-center">
                                            <p class="text-xs text-gray-500">Madinah</p>
                                            <p class="text-sm font-bold text-gold-700">{{ $package->madinah_nights }}N</p>
                                        </div>
                                    </div>

                                    <!-- Tags -->
                                    <div class="flex flex-wrap gap-1.5 mb-4">
                                        @if($package->visa_included)
                                            <span class="px-2 py-0.5 bg-emerald-100 text-emerald-800 text-xs font-medium rounded-full">Visa Included</span>
                                        @endif
                                        @if($package->direct_flight)
                                            <span class="px-2 py-0.5 bg-gold-100 text-gold-800 text-xs font-medium rounded-full">Direct Flight</span>
                                        @endif
                                    </div>

                                    <div class="mt-auto">
                                        <a href="{{ route('packages.show', $package->slug) }}" class="w-full inline-flex items-center justify-center gap-2 py-2.5 gradient-emerald text-cream-50 font-semibold rounded-lg hover:shadow-md transition-all">
                                            View Details
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-10">
                        {{ $packages->withQueryString()->links() }}
                    </div>
                @else
                    <div class="bg-white rounded-2xl p-16 text-center border border-gray-100">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <h3 class="text-lg font-bold text-gray-700 mb-2">No Packages Found</h3>
                        <p class="text-gray-500 mb-6">Try adjusting your filters to see more results.</p>
                        <a href="{{ route('packages.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5 gradient-emerald text-cream-50 font-semibold rounded-lg">
                            Clear Filters
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
