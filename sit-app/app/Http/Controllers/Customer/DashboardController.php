<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = Customer::where('user_id', auth('customer')->id())->first();
        $bookings = $customer ? $customer->bookings()->latest()->take(5)->get() : collect();
        return view('customer.dashboard', compact('customer', 'bookings'));
    }

    public function bookings()
    {
        $customer = Customer::where('user_id', auth('customer')->id())->first();
        $bookings = $customer ? $customer->bookings()->latest()->paginate(10) : collect();
        return view('customer.bookings', compact('bookings'));
    }

    public function bookingDetail($reference)
    {
        $customer = Customer::where('user_id', auth('customer')->id())->first();
        $booking = Booking::where('customer_id', $customer?->id)
            ->where('booking_reference', $reference)
            ->with(['passengers', 'package', 'departureGroup', 'payments'])
            ->firstOrFail();
        return view('customer.booking-detail', compact('booking'));
    }

    public function profile()
    {
        $customer = Customer::where('user_id', auth('customer')->id())->first();
        return view('customer.profile', compact('customer'));
    }
}
