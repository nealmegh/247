<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Booking;
use App\Car;
use App\Location;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function index(){
        return view('Agent.home');
    }
    public function bookingIndex()
    {
        $bookings = Booking::where('book_by', Auth::id())->get();
        return view('Agent.Booking.index')->with(compact('bookings'));
    }
    public function create()
    {
        $cars = Car::all();
        $locations = Location::all();
        $airports = Airport::all();
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'customer');
        })->get();


        return view('Agent.Booking.create', compact('cars', 'locations', 'airports', 'users'));
    }

    public function priceUpdate(Request $request)
    {
        $fromString = $request->selectFrom;
        $maintain = mb_substr($fromString, 0, 3);
        $from = substr($fromString, 3);
        $to = $request->selectTo;
        $price = 0;
        $returnPrice = 0;
        if($maintain == 'loc')
        {
            $location = Location::find($from);
            foreach ($location->airports as $airport)
            {
                if($airport->id == $to)
                {
                    $price = round($airport->pivot->price,2);
                    $returnPrice = round($airport->pivot->return_price, 2);
                }
            }
        }
        else
        {
            $location = Location::find($to);
            foreach ($location->airports as $airport)
            {
                if($airport->id == $from)
                {
                    $price = round($airport->pivot->return_price,2);
                    $returnPrice = round($airport->pivot->price, 2);
                }
            }
        }

        return response()->json(['price'=> $price, 'returnPrice'=> $returnPrice]);

    }
}
