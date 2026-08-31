<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Customer;

class CustomerAuthController extends Controller
{
    public function showLogin()
    {
        return view('customer.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth('customer')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('customer.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('customer.auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'mobile' => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'guard' => 'customer',
            'phone' => $data['mobile'] ?? null,
        ]);

        Customer::create([
            'user_id' => $user->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'] ?? null,
            'source_channel' => 'b2c',
        ]);

        Auth('customer')->login($user);
        return redirect()->route('customer.dashboard');
    }

    public function logout(Request $request)
    {
        Auth('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
