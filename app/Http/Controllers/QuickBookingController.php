<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Car;
use App\Models\Location;
use App\Models\QuickBooking;
use App\Http\Requests\StoreQuickBookingRequest;
use App\Http\Requests\UpdateQuickBookingRequest;
use App\Models\User;

class QuickBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $cars = Car::all();
        $locations = Location::all();
        $airports = Airport::all();

        $users = User::where('role_id', 2)->get();


        return view('Backend.Quick.create', compact('cars', 'locations', 'airports', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuickBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuickBookingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuickBooking  $quickBooking
     * @return \Illuminate\Http\Response
     */
    public function show(QuickBooking $quickBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuickBooking  $quickBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(QuickBooking $quickBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuickBookingRequest  $request
     * @param  \App\Models\QuickBooking  $quickBooking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuickBookingRequest $request, QuickBooking $quickBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuickBooking  $quickBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuickBooking $quickBooking)
    {
        //
    }
}
