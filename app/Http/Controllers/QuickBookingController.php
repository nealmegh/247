<?php

namespace App\Http\Controllers;

use App\Http\Traits\DestinationTrait;
use App\Mail\BookingSuccessful;
use App\Models\Airport;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Location;
use App\Models\QuickBooking;
use App\Http\Requests\StoreQuickBookingRequest;
use App\Http\Requests\UpdateQuickBookingRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class QuickBookingController extends Controller
{
    use DestinationTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = QuickBooking::all();
        return view('Backend.Quick.index', compact('bookings'));
    }
    public function finalize($booking)
    {

        $booking = QuickBooking::find($booking);
        $cars = Car::all();
        $locations = Location::all();
        $airports = Airport::all();
        $users = User::where('role_id', 2)->get();
        return view('Backend.Booking.fromQuick', compact('cars', 'locations', 'airports', 'users', 'booking'));
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
     * @return \Illuminate\Http\Response|string
     */
    public function store(StoreQuickBookingRequest $request)
    {
        Validator::make($request->all(), [
            'custom_price' => ['required'],
        ])->validate();
        $request = $this->newCustomer($request);
        $request = $this->setDestination($request);

        $authUser = Auth::user();
        $request->request->add(['book_by' => $authUser->id]);

        $booking = QuickBooking::create($request->all());
        if($request->send_email == 1)
        {
            $data = array(
                'booking' => $booking,
            );
            Mail::to($booking->user->email)->send(new BookingSuccessful($data));
        }
        return redirect()->route('booking.quick.bookings.index');
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
