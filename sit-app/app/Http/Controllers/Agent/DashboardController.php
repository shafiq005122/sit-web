<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Package;
use App\Models\DepartureGroup;

class DashboardController extends Controller
{
    public function index()
    {
        $agency = auth('agent')->user()->agency;
        $bookings = Booking::where('agency_id', $agency->id)->latest()->take(5)->get();
        $stats = [
            'total_bookings' => Booking::where('agency_id', $agency->id)->count(),
            'pending_bookings' => Booking::where('agency_id', $agency->id)->where('status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('agency_id', $agency->id)->where('status', 'confirmed')->count(),
            'outstanding' => Booking::where('agency_id', $agency->id)->sum('outstanding_amount'),
        ];
        $wallet = $agency->wallet;
        return view('agent.dashboard', compact('agency', 'bookings', 'stats', 'wallet'));
    }

    public function packages()
    {
        $packages = Package::b2bVisible()->orderBy('sort_order')->paginate(9);
        return view('agent.packages', compact('packages'));
    }

    public function groups()
    {
        $groups = DepartureGroup::open()->with('package')->orderBy('departure_date')->paginate(10);
        return view('agent.groups', compact('groups'));
    }

    public function bookings()
    {
        $agency = auth('agent')->user()->agency;
        $bookings = Booking::where('agency_id', $agency->id)->latest()->paginate(10);
        return view('agent.bookings', compact('bookings'));
    }

    public function wallet()
    {
        $agency = auth('agent')->user()->agency;
        $wallet = $agency->wallet;
        $transactions = $wallet ? $wallet->transactions()->latest()->paginate(20) : collect();
        return view('agent.wallet', compact('wallet', 'transactions'));
    }
}
