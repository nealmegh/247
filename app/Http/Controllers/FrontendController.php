<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Location;
use App\Mail\contactForm;
use App\Models\SiteSettings;
//use Auth;
use App\Models\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Http\Request;

use Redirect;



class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $airports = Airport::all();
        $locations = Location::all()->except(97);
//        dd($airports, $locations);
//        return view('Frontend.home', compact('airports', 'locations'));
        return view('2Frontend.index', compact('airports', 'locations'));
//        return view('2Frontend.layout');

    }
    public function index1()
    {
        $booking = Booking::find(205);
        $driver = Driver::find($booking->driver_id);
        $user_id = $booking->user->id;
        $user = User::find($user_id);
//        dd($airports, $locations);
//        return view('Frontend.home', compact('airports', 'locations'));
//        $data['booking'] = $booking;

        $data = array(
            'driver' => $driver,
            'booking' => $booking,
            'user' => $user
        );


        return view('Email.driverAssigned', compact('data'));
//        return view('2Frontend.layout');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFair()
    {
        $price = 0;

        $to = $_POST['to'];

        $fromString = $_POST['from'];

        $maintain = mb_substr($fromString, 0, 3);
        $from = substr($fromString, 3);

        if($maintain == 'loc')
        {
            $location = Location::find($from);
            foreach ($location->airports as $airport)
            {
                if($airport->id == $to)
                {
                    $price = $airport->pivot->price;
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
                    $price = $airport->pivot->return_price;
                }
            }
        }

        return response()->json(array('msg'=> $price), 200);
    }

    public function booking(Request $request)
    {
        if(!$request->hiddenPrice > 0)
        {
            return redirect()->back();
        }

        $to = $_GET['selectTo'];

        $fromString = $_GET['selectFrom'];
        $maintain = mb_substr($fromString, 0, 3);
        $from = substr($fromString, 3);


        if($maintain == 'loc')
        {
            $locationM = Location::find($from);

            foreach ($locationM->airports as $airportM)
            {
                if($airportM->id == $to)
                {
                    $price = $airportM->pivot->price;
                    $returnPrice = $airportM->pivot->return_price;
                    $location = $locationM->id;
                    $airport = $airportM->id;
                    $airportN = $airportM;

                }
            }
        }
        else
        {
            $locationM = Location::find($to);

            foreach ($locationM->airports as $airportM)
            {
                if($airportM->id == $from)
                {
                    $price = $airportM->pivot->return_price;
                    $returnPrice = $airportM->pivot->price;
                    $location = $locationM->id;
                    $airport = $airportM->id;
                    $airportN = $airportM;
                }
            }
        }
        $cars = Car::all();

        return view('2Frontend.Booking.bookingForm', compact('request', 'cars', 'price', 'location', 'airport', 'maintain', 'locationM', 'airportM', 'returnPrice', 'airportN' ));

    }

    public function bookingConfirmation($id)
    {
        $booking = Booking::find($id);
        return view('2Frontend.Booking.confirmation', compact('booking'));
    }

    public function terms()
    {
        return view('2Frontend.terms');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function bookingStore(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'adult' => ['required', 'string'],
                'child' => ['required', 'string'],
                'luggage' => ['required', 'string'],
                'carryon' => ['required', 'string'],
                'dropoff_address' => ['required', 'string'],
                'pickup_address' => ['required', 'string'],
                'journey_date' => ['required', 'string'],
                'pickup_time' => ['required', 'string'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);

        }
        else
        {
// dd($request->all());
            $location = Location::find($request->location_id);
            $airport = Airport::find($request->airport_id);
            $car = Car::find($request->car_id);
            $price = 0;
            $returnPrice = 0;
            $meetPrice = 0;
            $carPrice = round($car->fair, 2);
            $totalPrice = 0;
            $siteSettings = SiteSettings::all();
            $meetValue = round($siteSettings[0]->value, 2);
            $booking = 0;

            foreach ($location->airports as $airportP) {
                if ($airport->id == $airportP->id) {
                    if ($request->from_to == 'loc') {
                        $price = round($airportP->pivot->price, 2);
                        $returnPrice = round($airportP->pivot->return_price, 2);
                    } else {
                        $price = round($airportP->pivot->return_price, 2);
                        $returnPrice = round($airportP->pivot->price, 2);
                    }
                }
            }
            if($car->fair == 500)
            {
                $carPrice = round($price*.5, 2);
            }
            if ($request->return == 1) {
                $carPrice = $carPrice * 2;

            } else {
                $returnPrice = 0;
            }


            if ($request->meet == 1) {
                $meetPrice = $meetValue;
            }

            $totalPrice = round($meetPrice + $price + $carPrice + $returnPrice, 2);
            $hiddenPrice = round($request->hiddenPrice, 2);
           // dd($totalPrice, $hiddenPrice);
            if ($totalPrice != $hiddenPrice) {
                return redirect()->back();
            } else {
                $request->price = $totalPrice;
                $request->request->add(['price' => $totalPrice]);
                $request->request->add(['discount_type' => 0]);
                $request->request->add(['discount_value' => 0]);
                $request->request->add(['discount_amount' => 0]);
                $request->request->add(['final_price' => $totalPrice]);
                $authUser = Auth::user();
                $request->request->add(['book_by' => $authUser->id]);
                $booking = Booking::create($request->all());


            }

            $date = Carbon::now();
//        $refDate = $date

            $day = $date->format('d');
            $month = $date->format('m');
            $year = $date->format('Y');
            $refID = '';
            if($booking->id < 999)
            {
                $refID = $year.$month.$day.'0'.$booking->id;
            }
            else
            {
                $refID = $year.$month.$day.$booking->id;
            }

            $booking->ref_id = $refID;
            $booking->save();

            return redirect()->route('front.booking.confirm', [$booking]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *
     */
    public function dashboard()
    {
        $user = Auth::user();

        $bookings = Booking::where('user_id', '=', $user->id)->get();

        $bookings = $bookings->sortByDesc('id');
        return view('Backend.Booking.index', compact('bookings'));
//        return view('Frontend.Profile.index', compact('bookings'));

    }

    public function myInfo()
    {
        $user = Auth::user();
        return view('Backend.User.profile', compact('user'));
    }

    public function contact(Request $request)
    {
        $siteSettings = SiteSettings::all();
        $to = $siteSettings[7]->value;
        $from = $request->email;
        $subject = $request->name.' From Web';
        $message = $request->message;

        $data = array(
            'to' => $to,
            'from' => $from,
            'message' => $message,
            'subject' => $subject
        );

        /** @var TYPE_NAME $data */
        Mail::to($to)->send(new contactForm($data));

//        dd('success');
        return redirect()->route('land');
    }
}
