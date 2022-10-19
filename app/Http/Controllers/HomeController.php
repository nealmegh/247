<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Driver;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        $bookings = Booking::orderBy('id', 'desc')->take(10)->get();
        $numberOfCustomers = count(User::where('role_id', '2')->get());
        $numberOfTrips = count(Trip::all());
        $numberOfDrivers = count(Driver::all());
        return view('Backend.Dashboard.index')->with(compact('bookings', 'numberOfCustomers', 'numberOfDrivers', 'numberOfTrips'));
    }
    public function reports()
    {
        $bookings = Booking::orderBy('id', 'desc')->take(10)->get();
        $numberOfCustomers = count(User::where('role_id', '2')->get());
        $numberOfTrips = count(Trip::all());
        $numberOfDrivers = count(Driver::all());
        return view('Backend.Dashboard.reports')->with(compact('bookings', 'numberOfCustomers', 'numberOfDrivers', 'numberOfTrips'));
    }
}
