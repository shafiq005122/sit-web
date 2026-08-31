<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Agency;

class AgentAuthController extends Controller
{
    public function showLogin()
    {
        return view('agent.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth('agent')->attempt($credentials, $request->boolean('remember'))) {
            $user = Auth('agent')->user();
            if (!$user->agency_id || $user->agency->status !== 'approved') {
                Auth('agent')->logout();
                return back()->withErrors(['email' => 'Your agency account is not approved yet.'])->onlyInput('email');
            }
            $request->session()->regenerate();
            return redirect()->route('agent.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('agent.auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'agency_name' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'mobile' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'office_address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'company_reg_no' => 'nullable|string|max:255',
            'travel_licence' => 'nullable|string|max:255',
            'cnic' => 'nullable|string|max:255',
        ]);

        $agency = Agency::create([
            'agency_name' => $data['agency_name'],
            'owner_name' => $data['owner_name'],
            'contact_person' => $data['contact_person'] ?? null,
            'email' => $data['email'],
            'mobile' => $data['mobile'] ?? null,
            'whatsapp' => $data['whatsapp'] ?? null,
            'office_address' => $data['office_address'] ?? null,
            'city' => $data['city'] ?? null,
            'country' => $data['country'] ?? null,
            'company_reg_no' => $data['company_reg_no'] ?? null,
            'travel_licence' => $data['travel_licence'] ?? null,
            'cnic' => $data['cnic'] ?? null,
            'status' => 'pending',
        ]);

        $user = User::create([
            'name' => $data['owner_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'guard' => 'agent',
            'agency_id' => $agency->id,
            'phone' => $data['mobile'] ?? null,
        ]);

        return redirect()->route('agent.login')->with('status', 'Registration submitted. You will be notified once your agency is approved.');
    }

    public function logout(Request $request)
    {
        Auth('agent')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
