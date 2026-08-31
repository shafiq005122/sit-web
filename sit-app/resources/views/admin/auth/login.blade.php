@extends('layouts.public')
@section('title', 'Admin Login')

@section('content')
<div class="min-h-screen flex items-center justify-center gradient-emerald px-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <div class="text-center mb-8">
                <div class="w-16 h-16 mx-auto rounded-full gradient-emerald flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-gold-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7v10l10 5 10-5V7L12 2z"/></svg>
                </div>
                <h1 class="text-2xl font-bold text-emerald-800">Admin Panel</h1>
                <p class="text-sm text-gray-500 mt-2">Restricted access — authorized personnel only</p>
            </div>
            <form action="{{ route('admin.login') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" autofocus class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="admin@siddiqueibrahim.com">
                    @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="••••••••">
                    @error('password') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="w-full py-3 gradient-emerald text-white font-semibold rounded-lg hover:opacity-90 transition shadow-md">Sign In</button>
            </form>
            <p class="text-center text-sm text-gray-400 mt-6"><a href="{{ route('home') }}" class="hover:text-emerald-600">Back to website</a></p>
        </div>
    </div>
</div>
@endsection
