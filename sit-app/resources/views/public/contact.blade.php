@extends('layouts.public')
@section('title', 'Contact Us')

@section('content')
<div class="bg-emerald-900 text-white py-12 relative overflow-hidden">
    <div class="islamic-pattern absolute inset-0 opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl lg:text-4xl font-bold">Contact Us</h1>
        <p class="text-cream-200/80 mt-2">We are here to help you plan your sacred journey.</p>
    </div>
</div>

<section class="py-16 bg-cream-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl p-8 border border-gray-100">
                <h2 class="text-xl font-bold text-emerald-800 mb-6">Send Us a Message</h2>
                <form action="{{ route('contact') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Full Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Your name">
                            @error('name') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="you@example.com">
                            @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Phone Number</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="+92 300 1234567">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Subject</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="How can we help?">
                            @error('subject') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Message</label>
                        <textarea name="message" rows="5" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none resize-none" placeholder="Tell us about your requirements...">{{ old('message') }}</textarea>
                        @error('message') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="px-8 py-3 bg-emerald-700 text-white font-semibold rounded-lg hover:bg-emerald-600 transition shadow-md">Send Message</button>
                </form>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-2xl p-6 border border-gray-100">
                <h3 class="text-lg font-bold text-emerald-800 mb-4">Get in Touch</h3>
                <div class="space-y-4 text-sm">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div><p class="text-gray-500">Phone</p><p class="font-medium text-gray-800">+92 21 1234 5678</p></div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div><p class="text-gray-500">Email</p><p class="font-medium text-gray-800">info@siddiqueibrahim.com</p></div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div><p class="text-gray-500">Office</p><p class="font-medium text-gray-800">Karachi, Pakistan</p></div>
                    </div>
                </div>
            </div>
            <div class="gradient-emerald rounded-2xl p-6 text-white">
                <h3 class="text-lg font-bold mb-2">Office Hours</h3>
                <div class="space-y-2 text-sm text-cream-200/80">
                    <p>Monday - Saturday: 9:00 AM - 7:00 PM</p>
                    <p>Friday: 2:00 PM - 7:00 PM</p>
                    <p>Sunday: Closed</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
