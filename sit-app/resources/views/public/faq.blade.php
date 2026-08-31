@extends('layouts.public')
@section('title', 'FAQ — Frequently Asked Questions')

@section('content')
<div class="bg-emerald-900 text-white py-12 relative overflow-hidden">
    <div class="islamic-pattern absolute inset-0 opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl lg:text-4xl font-bold">Frequently Asked Questions</h1>
        <p class="text-cream-200/80 mt-2">Find answers to common questions about our Umrah packages and services.</p>
    </div>
</div>

<section class="py-16 bg-cream-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-4">
            @php
            $faqs = [
                ['What documents are required for Umrah?', 'You need a valid passport (minimum 6 months validity), passport-size photographs, vaccination certificate, and completed visa application form. Our team will guide you through the entire process.'],
                ['How far in advance should I book?', 'We recommend booking at least 4-6 weeks before your preferred departure date to secure your seat and allow sufficient time for visa processing.'],
                ['Is the Umrah visa included in the package?', 'Visa inclusion depends on the package you select. Many of our packages include visa processing as part of the service. Check the package details for confirmation.'],
                ['What is the cancellation policy?', 'Free cancellation is available up to 14 days before departure. Cancellations within 14 days may incur charges depending on the package terms.'],
                ['Are flights included in the package?', 'Yes, all our packages include round-trip flights from the specified departure city. Some packages offer direct flights while others may have connecting flights.'],
                ['What type of hotels are provided?', 'We offer a range of hotel categories from 3-star to 5-star, all located near the Haram in Makkah and Madinah. The specific hotel category depends on the package you choose.'],
                ['Can I customize my package?', 'Yes, we offer customization options. Contact our team to discuss your specific requirements including extended stays, additional services, or special arrangements.'],
                ['Do you provide transport for Ziyarah?', 'Yes, guided Ziyarah tours in Makkah and Madinah are included in most packages. Transport is provided in air-conditioned coaches.'],
                ['Is travel insurance included?', 'Travel insurance is not included by default but can be added to any package for an additional fee. We highly recommend purchasing travel insurance.'],
                ['How do I make a payment?', 'You can make payments through our secure online portal, bank transfer, or by visiting our office. We offer flexible payment plans for select packages.'],
            ];
            @endphp
            @foreach($faqs as $index => $faq)
            <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
                <button class="faq-toggle w-full flex items-center justify-between p-5 text-left" data-index="{{ $index }}">
                    <span class="font-semibold text-emerald-800">{{ $faq[0] }}</span>
                    <svg class="w-5 h-5 text-gold-500 transition-transform flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div id="faq-{{ $index }}" class="hidden px-5 pb-5 text-gray-600 leading-relaxed">
                    {{ $faq[1] }}
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-12 text-center bg-white rounded-2xl p-8 border border-gray-100">
            <h3 class="text-xl font-bold text-emerald-800 mb-2">Still Have Questions?</h3>
            <p class="text-gray-500 mb-4">Our team is here to help you with any questions you may have.</p>
            <a href="{{ route('contact') }}" class="inline-flex px-6 py-3 bg-emerald-700 text-white font-medium rounded-lg hover:bg-emerald-600 transition">Contact Us</a>
        </div>
    </div>
</section>

@section('scripts')
<script>
document.querySelectorAll('.faq-toggle').forEach(btn => {
    btn.addEventListener('click', () => {
        const content = document.getElementById('faq-' + btn.dataset.index);
        const icon = btn.querySelector('svg');
        content.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    });
});
</script>
@endsection
@endsection
