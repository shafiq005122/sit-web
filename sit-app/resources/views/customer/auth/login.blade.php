@extends('layouts.public')
@section('title', 'Customer Login')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center bg-cream-50 py-16 px-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
            <div class="text-center mb-8">
                <div class="w-16 h-16 mx-auto rounded-full gradient-emerald flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-gold-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7v10l10 5 10-5V7L12 2z"/></svg>
                </div>
                <h1 class="text-2xl font-bold text-emerald-800">Customer Login</h1>
                <p class="text-sm text-gray-500 mt-2">Sign in to manage your bookings</p>
            </div>
            @if(session('status'))
            <div class="mb-4 p-3 bg-emerald-50 text-emerald-700 text-sm rounded-lg">{{ session('status') }}</div>
            @endif
            <form action="{{ route('customer.login') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" autofocus class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="you@example.com">
                    @error('email') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none" placeholder="••••••••">
                    @error('password') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 text-sm text-gray-600">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-emerald-600"> Remember me
                    </label>
                </div>
                <button type="submit" class="w-full py-3 bg-emerald-700 text-white font-semibold rounded-lg hover:bg-emerald-600 transition shadow-md">Sign In</button>
            </form>
            <p class="text-center text-sm text-gray-500 mt-6">Don't have an account? <a href="{{ route('customer.register') }}" class="text-emerald-700 font-medium hover:text-emerald-600">Register here</a></p>
        </div>
        <p class="text-center text-sm text-gray-400 mt-4">Are you a travel agent? <a href="{{ route('agent.login') }}" class="text-emerald-600 font-medium">Agent Portal</a></p>
    </div>
</div>
@endsection
