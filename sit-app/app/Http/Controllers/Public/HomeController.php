<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\DepartureGroup;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPackages = Package::published()->where('is_featured', true)->orderBy('sort_order')->take(6)->get();
        $upcomingGroups = DepartureGroup::open()->where('departure_date', '>', now())->orderBy('departure_date')->take(4)->get();
        return view('public.home', compact('featuredPackages', 'upcomingGroups'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function services()
    {
        return view('public.services');
    }

    public function packages(Request $request)
    {
        $query = Package::b2cVisible();

        if ($request->filled('departure_city')) {
            $query->where('departure_city', $request->departure_city);
        }
        if ($request->filled('airline')) {
            $query->where('airline', $request->airline);
        }
        if ($request->filled('hotel_category')) {
            $query->where('hotel_category', $request->hotel_category);
        }
        if ($request->filled('visa_included')) {
            $query->where('visa_included', $request->boolean('visa_included'));
        }
        if ($request->filled('direct_flight')) {
            $query->where('direct_flight', $request->boolean('direct_flight'));
        }

        $packages = $query->orderBy('sort_order')->paginate(9);
        return view('public.packages', compact('packages'));
    }

    public function packageDetail($slug)
    {
        $package = Package::b2cVisible()->where('slug', $slug)->firstOrFail();
        $groups = $package->departureGroups()->open()->orderBy('departure_date')->get();
        return view('public.package-detail', compact('package', 'groups'));
    }

    public function groups(Request $request)
    {
        $query = DepartureGroup::open()->with('package');

        if ($request->filled('departure_city')) {
            $query->where('departure_city', $request->departure_city);
        }
        if ($request->filled('package_id')) {
            $query->where('package_id', $request->package_id);
        }

        $groups = $query->orderBy('departure_date')->paginate(10);
        return view('public.groups', compact('groups'));
    }

    public function groupDetail($id)
    {
        $group = DepartureGroup::open()->with(['package', 'flights', 'inventory'])->findOrFail($id);
        return view('public.group-detail', compact('group'));
    }

    public function faq()
    {
        return view('public.faq');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function documents()
    {
        return view('public.documents');
    }
}
