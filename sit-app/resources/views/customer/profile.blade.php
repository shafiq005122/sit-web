@extends('layouts.customer')
@section('title', 'My Profile')

@section('content')
<div class="max-w-2xl space-y-6">
    <div class="bg-white rounded-2xl p-6 border border-gray-100">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Profile Information</h2>
        <form action="{{ route('customer.profile') }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Full Name</label>
                    <input type="text" name="name" value="{{ $customer?->name ?? old('name') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                    <input type="email" name="email" value="{{ $customer?->email ?? old('email') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Mobile</label>
                    <input type="text" name="mobile" value="{{ $customer?->mobile ?? old('mobile') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">CNIC</label>
                    <input type="text" name="cnic" value="{{ $customer?->cnic ?? old('cnic') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Address</label>
                <input type="text" name="address" value="{{ $customer?->address ?? old('address') }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
            </div>
            <button type="submit" class="px-6 py-2.5 bg-emerald-700 text-white font-medium rounded-lg hover:bg-emerald-600 transition">Save Changes</button>
        </form>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Change Password</h2>
        <form action="{{ route('customer.profile') }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Current Password</label>
                <input type="password" name="current_password" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">New Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                </div>
            </div>
            <button type="submit" class="px-6 py-2.5 bg-emerald-700 text-white font-medium rounded-lg hover:bg-emerald-600 transition">Update Password</button>
        </form>
    </div>
</div>
@endsection
