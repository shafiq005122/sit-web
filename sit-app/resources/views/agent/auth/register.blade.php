@extends('layouts.public')
@section('title', 'Agent Registration')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center bg-cream-50 py-16 px-4">
    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
            <div class="text-center mb-8">
                <div class="w-16 h-16 mx-auto rounded-full gradient-emerald flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-gold-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7v10l10 5 10-5V7L12 2z"/></svg>
                </div>
                <h1 class="text-2xl font-bold text-emerald-800">Register Your Agency</h1>
                <p class="text-sm text-gray-500 mt-2">Join our B2B network and access exclusive rates</p>
            </div>
            <form action="{{ route('agent.register') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Agency Name *</label>
                        <input type="text" name="agency_name" value="{{ old('agency_name') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Your travel agency">
                        @error('agency_name') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Owner Name *</label>
                        <input type="text" name="owner_name" value="{{ old('owner_name') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Owner full name">
                        @error('owner_name') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Contact Person</label>
                        <input type="text" name="contact_person" value="{{ old('contact_person') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Contact person">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="agency@example.com">
                        @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Mobile</label>
                        <input type="text" name="mobile" value="{{ old('mobile') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="+92 300 1234567">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">WhatsApp</label>
                        <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="+92 300 1234567">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">City</label>
                        <input type="text" name="city" value="{{ old('city') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Karachi">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Country</label>
                        <input type="text" name="country" value="{{ old('country') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Pakistan">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Office Address</label>
                    <input type="text" name="office_address" value="{{ old('office_address') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Full office address">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Company Reg. No</label>
                        <input type="text" name="company_reg_no" value="{{ old('company_reg_no') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Travel Licence</label>
                        <input type="text" name="travel_licence" value="{{ old('travel_licence') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">CNIC</label>
                        <input type="text" name="cnic" value="{{ old('cnic') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Password *</label>
                        <input type="password" name="password" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Minimum 8 characters">
                        @error('password') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Confirm Password *</label>
                        <input type="password" name="password_confirmation" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="Re-enter password">
                        @error('password_confirmation') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="p-3 bg-gold-50 rounded-lg text-sm text-gold-700">
                    Your registration will be reviewed by our admin team. You will be notified once your agency is approved.
                </div>
                <button type="submit" class="w-full py-3 bg-emerald-700 text-white font-semibold rounded-lg hover:bg-emerald-600 transition shadow-md">Submit Registration</button>
            </form>
            <p class="text-center text-sm text-gray-500 mt-6">Already registered? <a href="{{ route('agent.login') }}" class="text-emerald-700 font-medium hover:text-emerald-600">Sign in</a></p>
        </div>
    </div>
</div>
@endsection
