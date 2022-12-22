<?php

namespace App\Http\Controllers;

use App\Http\Traits\DestinationTrait;
use App\Mail\BookingSuccessful;
use App\Models\Airport;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Location;
use App\Mail\contactForm;
use App\Models\SiteSettings;
//use Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Validator;
use Illuminate\Http\Request;

use Redirect;



class FrontendController extends Controller
{
    use DestinationTrait;
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
    public function bookingPayment($id){
        $booking = Booking::find($id);

        Stripe::setApiKey('sk_test_AfpvjCkwd88clAxlrWS1ZExF');
        $stripeCustomer = Auth::user()->createOrGetStripeCustomer();

        $intent = PaymentIntent::create([
            'customer' => $stripeCustomer->id,
            'description' => $booking->id,
            'amount' => $booking->final_price*100,
            'currency' => 'gbp',
            'automatic_payment_methods' => [
                'enabled' => 'true',
            ],
            'receipt_email' => $booking->user->email,
        ]);
        $client_secret = $intent->client_secret;

        return view('2Frontend.Booking.stripe', compact('booking', 'intent'));
    }
    public function paymentConfirmation(Request $request, $id)
    {
//        dd($request->all());
        $booking = Booking::find($id);
        return view('2Frontend.Booking.success', compact('booking'));
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
//dd($request->all());
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
            $surcharge = $this->surcharge_calculate($request, $price, $returnPrice, $siteSettings);
            $totalPrice = round($meetPrice + $price + $carPrice + $returnPrice + $surcharge, 2);
            $hiddenPrice = round($request->hiddenPrice, 2);

            if ($totalPrice != $hiddenPrice) {

                return redirect()->back();
            } else {
                $request->price = $totalPrice;
                $request = $this->dateTimeSet($request);
                $request->request->add(['price' => $totalPrice]);
                $request->request->add(['discount_type' => 0]);
                $request->request->add(['discount_value' => 0]);
                $request->request->add(['discount_amount' => 0]);
                $request->request->add(['final_price' => $totalPrice]);
                $authUser = Auth::user();
                $request->request->add(['book_by' => $authUser->id]);
                $booking = Booking::create($request->all());
            }


            $this->generateRefId($booking);

            if( $siteSettings[22]->value == 1)
            {
                $data = array(
                    'booking' => $booking,
                );
                Mail::to($booking->user->email)->send(new BookingSuccessful($data));
            }

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
    private function generateRefId($booking){
        $date = Carbon::now();
        $day = $date->format('d');
        $month = $date->format('m');
        $year = $date->format('Y');

        $rounder = ($booking->id < 999)?'0':'';
        $refID = $year.$month.$day.$rounder.$booking->id;

        $booking->ref_id = $refID;
        $booking->save();
    }
    private function surcharge_calculate($request, $price, $return_price, $siteSettings)
    {
        $start_time = $siteSettings[51]->value;
        $end_time = $siteSettings[52]->value;
        $pickup_time = $request->pickup_time;
        $return_pickup_time = $request->return_time;
        $surcharge_rate = $siteSettings[53]->value;
        $surcharge = 0;
        $return_surcharge = 0;
        if( $start_time <= $pickup_time || $end_time >= $pickup_time) {

            if($surcharge_rate < 1)
            {
                $surcharge = $price*$surcharge;
            }
            else
            {
                $surcharge = $surcharge_rate;
            }
        }
        if ($request->return == 1) {
            if( $start_time <= $return_pickup_time || $end_time >= $return_pickup_time) {

                if($surcharge_rate < 1)
                {
                    $return_surcharge = $return_price*$surcharge;
                }
                else
                {
                    $return_surcharge = $surcharge_rate;
                }
            }

        }

        return $surcharge+$return_surcharge;
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
