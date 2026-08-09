<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Package;
use App\Models\DepartureGroup;
use App\Models\Agency;
use App\Models\Customer;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_bookings' => Booking::count(),
            'b2c_bookings' => Booking::where('source_channel', 'b2c')->count(),
            'b2b_bookings' => Booking::where('source_channel', 'b2b')->count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('status', 'confirmed')->count(),
            'total_passengers' => \App\Models\BookingPassenger::count(),
            'total_packages' => Package::count(),
            'total_groups' => DepartureGroup::count(),
            'total_agencies' => Agency::count(),
            'total_customers' => Customer::count(),
            'total_seats' => DepartureGroup::sum('total_seats'),
            'available_seats' => DepartureGroup::sum('available_seats'),
            'held_seats' => DepartureGroup::sum('held_seats'),
            'confirmed_seats' => DepartureGroup::sum('confirmed_seats'),
            'revenue' => Payment::sum('amount'),
            'collected' => Payment::where('payment_type', 'full')->sum('amount'),
            'outstanding' => Booking::sum('outstanding_amount'),
            'pending_agencies' => Agency::where('status', 'pending')->count(),
        ];

        $recentBookings = Booking::with(['customer', 'agency', 'package'])->latest()->take(8)->get();
        $recentAgencies = Agency::where('status', 'pending')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentBookings', 'recentAgencies'));
    }

    public function packages()
    {
        $packages = Package::withCount('departureGroups')->latest()->paginate(15);
        return view('admin.packages', compact('packages'));
    }

    public function groups()
    {
        $groups = DepartureGroup::with('package')->latest()->paginate(15);
        return view('admin.groups', compact('groups'));
    }

    public function bookings()
    {
        $bookings = Booking::with(['customer', 'agency', 'package', 'departureGroup'])->latest()->paginate(15);
        return view('admin.bookings', compact('bookings'));
    }

    public function agencies()
    {
        $agencies = Agency::with('tier')->latest()->paginate(15);
        return view('admin.agencies', compact('agencies'));
    }

    public function customers()
    {
        $customers = Customer::latest()->paginate(15);
        return view('admin.customers', compact('customers'));
    }

    public function payments()
    {
        $payments = Payment::with(['booking', 'agency'])->latest()->paginate(15);
        return view('admin.payments', compact('payments'));
    }
}
