@extends('layouts.public')
@section('title', 'Required Documents')

@section('content')
<div class="bg-emerald-900 text-white py-12 relative overflow-hidden">
    <div class="islamic-pattern absolute inset-0 opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl lg:text-4xl font-bold">Required Documents</h1>
        <p class="text-cream-200/80 mt-2">Everything you need to prepare for your Umrah journey.</p>
    </div>
</div>

<section class="py-16 bg-cream-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @php
            $documents = [
                ['Passport', 'A valid passport with minimum 6 months validity from the date of travel. Ensure you have at least 2 blank pages for visa stamps.', 'M9 12l2 2 4-4'],
                ['CNIC / National ID', 'A copy of your national identity card (CNIC for Pakistani citizens). Both sides must be clearly visible.', 'M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5M10 6V4a2 2 0 012-2h0a2 2 0 012 2v2'],
                ['Passport-Size Photographs', '4 recent passport-size photographs with white background. No glasses or headwear (except religious).', 'M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z'],
                ['Vaccination Certificate', 'Meningitis vaccination certificate (ACWY) is mandatory for Umrah. Must be administered at least 10 days before travel.', 'M19 14l-7 7m0 0l-7-7m7 7V3'],
                ['Visa Application Form', 'Completed Umrah visa application form. Our team will assist you in filling out the form correctly.', 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ['Women Mahram Proof', 'Female pilgrims must travel with a Mahram (male guardian). Proof of relationship is required (marriage certificate or birth certificate).', 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857'],
            ];
            @endphp
            @foreach($documents as $doc)
            <div class="bg-white rounded-2xl p-6 border border-gray-100 card-hover">
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 rounded-xl bg-emerald-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-7 h-7 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $doc[2] }}"/></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-emerald-800">{{ $doc[0] }}</h3>
                        <p class="text-sm text-gray-500 mt-1 leading-relaxed">{{ $doc[1] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-12 bg-white rounded-2xl p-8 border border-gray-100">
            <h3 class="text-xl font-bold text-emerald-800 mb-4">Additional Notes</h3>
            <ul class="space-y-3 text-sm text-gray-600">
                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-gold-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg> All documents must be clear and legible. Scanned copies should be in color.</li>
                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-gold-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg> Passport-size photos should be printed on matte (non-glossy) photo paper.</li>
                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-gold-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg> Children traveling with parents need their own passport and photographs.</li>
                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-gold-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg> Our team will verify all documents before submission to ensure a smooth visa process.</li>
            </ul>
        </div>

        <div class="mt-8 text-center bg-emerald-800 rounded-2xl p-8 text-white">
            <h3 class="text-xl font-bold mb-2">Need Help With Documents?</h3>
            <p class="text-cream-200/80 mb-4">Our team will guide you through the entire documentation process.</p>
            <a href="{{ route('contact') }}" class="inline-flex px-6 py-3 bg-gold-500 text-emerald-900 font-semibold rounded-lg hover:bg-gold-400 transition">Contact Us</a>
        </div>
    </div>
</section>
@endsection
