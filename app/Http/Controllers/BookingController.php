<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Traits\DestinationTrait;
use App\Mail\BookingCancelled;
use App\Mail\BookingCancelledDriver;
use App\Mail\BookingComplete;
use App\Mail\CustomerDriverAssign;
use App\Models\Airport;
use App\Models\Bill;
use Carbon\Carbon;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Support\Facades\Storage;
use PDF;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Invoice;
use App\Models\Location;
use App\Mail\BookingUpdated;
use App\Models\QuickBooking;
use App\Models\SiteSettings;
use App\Models\Trip;
use App\Models\User;
use App\Models\UserTransaction;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\BookingSuccessful;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\DriverAssigned;
use Illuminate\Support\Facades\Redirect;
use Laravel\Fortify\Fortify;
use mysql_xdevapi\Exception;


class BookingController extends Controller
{

//    use RegistersUsers;
use DestinationTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $bookings = Booking::where('complete_status', null)->orderBy('journey_date', 'DESC')->get();
//        $bookings = DB::table("bookings")->where('complete_status','=',null)->orderBy("journey_date", "DESC")->get();

//        dd($bookings[0]);
        return view('Backend.Booking.index', compact('bookings'));
    }
    public function completed()
    {
        $bookings = Booking::where('complete_status', 1)->get();
//        dd($bookings);
        return view('Backend.Booking.completed', compact('bookings'));
    }
    public function cancelled()
    {
        $bookings = Booking::onlyTrashed()->get();
        return view('Backend.Booking.cancelled', compact('bookings'));
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


        return view('Backend.Booking.create', compact('cars', 'locations', 'airports', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        try{

            $siteSettings = SiteSettings::all();

            $request = $this->setDestination($request);
            $request = $this->newCustomer($request);

            $authUser = Auth::user();
            $request->request->add(['book_by' => $authUser->id]);
            if($request->return == 1)
            {
                $return_datetime = new Carbon($request->return_date." ".$request->return_time);
                $request->return_date = $return_datetime->format('Y-m-d H:i:s');
                $request->request->add(['return_date' => $return_datetime->format('Y-m-d H:i:s')]);
            }

            $booking = Booking::create($request->all());
            $this->generateRefId($booking);

            if($request->send_email == 1 || $siteSettings[22]->value == 1)
            {
                $data = array(
                    'booking' => $booking,
                );
                Mail::to($booking->user->email)->send(new BookingSuccessful($data));
            }
        }
        catch (Exception $e)
        {

        }
        if($request->quickBook != Null){
            QuickBooking::destroy($request->quickBook);
        }
        if($authUser->role_id == 4)
        {
            return redirect()->route('agent.bookings')->with('message', 'Booking Created');
        }
        return redirect()->route('booking.bookings')->with('message', 'Booking Created');

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

    public function newCustomer(Request $request){
        if($request->newCustomer == '1')
        {
            if(User::where('email', '=', $request->email)->exists())
            {
                $user = User::where('email', '=', $request->email)->first();
                $request->request->add(['user_id' => $user->id]);
            }
            else
            {
                $password = $this->randomPassword();

                $data['name'] = $request->name;
                $data['email'] = $request->email;
//                $data['phone'] = $request->phone_number;
                $data['password'] = $password;
                $data['password_confirmation'] = $password;
//                $data['countryCode'] = $request->countryCode;
                $data['role_id'] = 2;
                $data['phone_full'] = '+'.$request->countryCode.$request->phone_number;

                try{
                    $createUser = New CreateNewUser();
                    $user = $createUser->create($data);
                    $request->request->add(['user_id' => $user->id]);
                }
                catch (Exception $exception)
                {

                }

            }
        }
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return false|\Illuminate\Http\Response|string
     */
    public function show($booking)
    {
        $booking = Booking::findORFail($booking);
        return json_encode($booking);
    }

    public function paymentConfirmation($id)
    {
        $booking = Booking::find($id);
        return view('Backend.Booking.payment', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        $cars = Car::all();
        $locations = Location::all();
        $airports = Airport::all();
        $users = User::where('role_id', 2)->get();
//        dd($booking->journey_time);


        return view('Backend.Booking.edit', compact('cars', 'locations', 'airports', 'users', 'booking'));
    }

    public function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siteSettings = SiteSettings::all();
        $request = $this->setDestination($request);
        $booking =Booking::find($id);
        $user_id = $booking->user->id;
        $user = User::find($user_id);

        if($booking->complete_status == 1)
        {
            return redirect()->route('bookings')->with('message', 'Booking is Already Completed');
        }
        $booking->fill($request->all())->save();
        $data = array(
            'driver' => null,
            'booking' => $booking,
        );
        if($request->send_email == '1' || $siteSettings[22]->value == 1)
        {

            Mail::to($booking->user->email)->send(new BookingUpdated($data));
        }

        if(Auth::user()->role_id == 4)
        {
            return redirect()->route('agent.bookings')->with('message', 'Booking Updated');
        }
        return redirect()->route('booking.bookings')->with('message', 'Booking Updated');
    }
    private function dateTimeSet(Request $request){
        $datetime = new Carbon($request->journey_date." ".$request->pickup_time);

        $request->journey_date = $datetime->format('Y-m-d H:i:s');

        $request->request->add(['journey_date' => $datetime->format('Y-m-d H:i:s')]);
        return $request;
    }
    private function priceSet(Request $request, $price, $returnPrice){
        $totalPrice = 0;
        $discount = 0;
        $finalPrice = 0;
        $meetPrice = 0;
        $siteSettings = SiteSettings::all();
        $meetValue = round(floatval($siteSettings[0]->value),2);
        $car = Car::find($request->car_id);
        $carPrice = round($car->fair, 2);
        if($car->fair == 500)
        {
            $carPrice = $price*.5;
        }
        if($request->return == 1)
        {
            $carPrice = $carPrice*2;
        }
        else
        {
            $returnPrice = 0;
        }
        if($request->meet == 1)
        {
            $meetPrice = $meetValue;
        }
        if($request->custom_price == 0)
        {
            $totalPrice = round($meetPrice + $price + $carPrice + $returnPrice,2);

            if($request->discount_value > 0)
            {
                if($request->discount_type == 0)
                {
                    $discount = $request->discount_value;
                }
                else
                {
                    $discount = $totalPrice*($request->discount_value/100);
                }
            }

            $finalPrice = round(($totalPrice - $discount) + $request->extra_price, 2);

        }
        else{
            $totalPrice = round($request->custom_price,2);
            $finalPrice = round(($totalPrice - $discount) + $request->extra_price, 2);

        }

        $request->request->add(['price' => $totalPrice]);
        $request->request->add(['discount_amount' => $discount]);
        $request->request->add(['final_price' => $finalPrice]);

        return $this->dateTimeSet($request);


    }
    public function destinationSet(Request $request){
        $price = 0;
        $returnPrice = 0;
        $to = $request->selectTo;
        $fromString = $request->selectFrom;
        $maintain = mb_substr($fromString, 0, 3);
        $from = substr($fromString, 3);
        $request->request->add(['from_to' => $maintain]);
        if($maintain == 'loc')
        {
            $location = Location::find($from);
            $request->request->add(['location_id' => $from]);
            $request->request->add(['airport_id' => $to]);
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

            $request->request->add(['airport_id' => $from]);
            $request->request->add(['location_id' => $to]);
            foreach ($location->airports as $airport)
            {
                if($airport->id == $from)
                {
                    $price = round($airport->pivot->return_price, 2);
                    $returnPrice = round($airport->pivot->price,2);;
                }
            }
        }
        return $this->priceSet($request, $price, $returnPrice);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Request $request, $booking)
    {

        $booking = Booking::find($booking);
//        $invoice = Invoice::find($booking->id);
        $trips = Trip::where('booking_id', $booking->id)->get();
        $transaction = UserTransaction::firstWhere('booking_id', $booking->id);
        $delete = true;
        foreach ($trips as $trip)
        {
            if($trip != null)
            {
                if($trip->status == 1)
                {
                    $delete = false;
                }
                else{
                    $driverA = Driver::find($trip->driver_id);
                    $user_id = $booking->user->id;
                    $user = User::find($user_id);
                    $dataA = array(
                        'driver' => $driverA,
                        'booking' => $booking,
                        'trip' => $trip,
                        'user' => $user
                    );
                    Mail::to($trip->driver->user->email)->send(new BookingCancelledDriver($dataA));
                }
            }

        }
        if($delete)
        {
            Trip::destroy($trips);
            $transaction->delete();
            $booking->delete();
        }

        $user_id = $booking->user->id;
        $user = User::find($user_id);
        $data = array(
            'driver' => $driverA,
            'booking' => $booking,
            'user' => $user
        );
        Mail::to($booking->user->email)->send(new BookingCancelled($data));


        $request->session()->flash('alert-class', 'alert-danger');
        return redirect()->route('booking.bookings')->with('message', 'Booking Deleted');
    }
    public function restore($booking){

        $booking = Booking::withTrashed()
            ->where('id', $booking)
            ->first();
        $booking->restore();
        return redirect()->route('booking.bookings')->with('message', 'Booking Restored');
    }



    public function driverAssign($id)
    {
        $booking = Booking::find($id);
        $drivers = Driver::where('status', 1)->get();
        if($booking->user_transaction_id == null)
        {
            return redirect()->back()->with('message', 'You need to define a Payment Method First');
        }
        else
        {
            $earnings = $this->tripEarnings($id);
        }
        return view('Backend.Booking.assign', compact('booking', 'drivers', 'earnings'));

    }

    public function driverReAssignStore(Request $request, $id)
    {
        $siteSettings = SiteSettings::all();
        $booking = Booking::find($id);
        $trips = Trip::where('booking_id', $id)->get();
        $success = array();
        $failure = array();
        foreach ($trips as $trip)
        {
            if($trip->trip_status == 1)
            {

                $failure [] = $trip->id;
            }
            else
            {
                if ($trip->journey_type == 'origin')
                {
                    $trip->driver_id = $request->driver_id;
                    $trip->collectable_by_driver = $request->collectable_by_driver;
                }
                else
                {
                    $trip->driver_id = $request->return_driver_id;
                    $trip->collectable_by_driver = $request->return_collectable_by_driver;
                }
                    $trip->save();
                    $success [] = $trip->id;

                    $driver = Driver::find($trip->driver_id);
                    $user_id = $trip->booking->user->id;
                    $user = User::find($user_id);
                    $data = array(
                        'driver' => $driver,
                        'booking' => $trip->booking,
                        'trip' => $trip,
                        'user' => $user
                    );
                    Mail::to($driver->email)->send(new DriverAssigned($data));
                if($request->send_email1_customer == 1 || $siteSettings[22]->value == 1)
                {
                    Mail::to($booking->user->email)->send(new BookingUpdated($dataB));
                }
            }
        }

        $fail_count = count($failure);
        $success_count = count($success);

        if($fail_count == 0)
        {
            $success_count = count($success);
            if($success_count == 2)
            {
                $request->session()->flash('message', $success_count.' trips has updated with id '.$success[0].' & '.$success[1]);
            }
            else
            {
                $request->session()->flash('message', $success_count.' trip has updated with id '.$success[0]);
            }

            $request->session()->flash('alert-class', 'alert-success');
        }
        elseif($fail_count == 1)
        {
            $success_count = count($success);
            if($success_count == 1)
            {
                $request->session()->flash('message', $success_count.' trip has updated with id '.$success[0].' & '.$fail_count.' Trip with id '.$failure[0].' could not be updated as it is already completed.');
                $request->session()->flash('alert-class', 'alert-warning');
            }
            else
            {
                $request->session()->flash('message', $fail_count.' trip could not be updated with id '.$failure[0].' as it is already completed.');
                $request->session()->flash('alert-class', 'alert-danger');
            }
        }
        else
        {
            $request->session()->flash('message', $fail_count.' trips could not be updated with id '.$failure[0].' & '.$failure[1].' as both were already completed.');
            $request->session()->flash('alert-class', 'alert-danger');
        }


        return redirect()->route('booking.bookings');
    }


    private function tripEarnings($id)
    {
        $booking = Booking::find($id);
        $price = 0;
        $returnPrice = 0;
        if($booking->custom_price != null || $booking->custom_price != 0){

            if($booking->return == 0)
            {
                $price = $booking->custom_price + $booking->extra_price;
            }
            else{
                $price = ($booking->custom_price + $booking->extra_price)/2;
                $returnPrice = ($booking->custom_price + $booking->extra_price)/2;
            }
        }
        else{
            if($booking->from_to == 'loc')
            {
                $location = Location::find($booking->location_id);

                foreach ($location->airports as $airport)
                {
                    if($airport->id == $booking->airport_id)
                    {

                        $price = round($airport->pivot->price,2);
                        $returnPrice = round($airport->pivot->return_price, 2);
                    }
                }
            }
            else
            {
                $location = Location::find($booking->location_id);

                    foreach ($location->airports as $airport)
                    {
                        if($airport->id == $booking->airport_id)
                        {

                            $price = round($airport->pivot->return_price,2);
                            $returnPrice = round($airport->pivot->price, 2);
                        }
                    }
            }
            $siteSettings = SiteSettings::all();
            if($booking->meet == 1)
            {
                $price = round($price + floatval($siteSettings[0]->value), 2);
                $returnPrice = round($returnPrice + floatval($siteSettings[0]->value), 2);
            }
            if($booking->car->fair == 500)
            {
                $price = round($price + ($price*.5), 2);
                $returnPrice = round($returnPrice + ($returnPrice*.5), 2);
            }
            else
            {
                $price = round($price + ($booking->car->fair),2);
                $returnPrice = round($returnPrice + $booking->car->fair, 2);
            }
            if($booking->extra_price != 0 || $booking->extra_price != null)
            {
                $price = round($price + $booking->extra_price, 2);
                $returnPrice = round($returnPrice + $booking->extra_price, 2);
            }
            if($booking->return == 0)
            {
                $returnPrice = 0;
            }
        }


        return [$price, $returnPrice];
    }
    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function driverAssignStore(Request $request, $id)
    {
        $siteSettings = SiteSettings::all();
        $booking = Booking::find($id);


        $earnnings = $this->tripEarnings($id);
        $tripDataA = [
            'driver_id' => $request->driver_id,
            'collectable_by_driver' => $request->collectable_by_driver,
            'booking_id' => $booking->id,
            'booking_ref_id' => $booking->ref_id,
            'trip_ref_id' => $booking->ref_id.'A',
            'journey_type' => 'origin',
            'journey_date' => $booking->journey_date,
            'trip_status' => 0,
            'trip_earnings' => $earnnings[0],
        ];

        $tripA = Trip::updateOrCreate(
            ['booking_id' => $booking->id, 'journey_type' => 'origin'],
            $tripDataA);

        $driverA = Driver::find($tripA->driver_id);
        $user_id = $booking->user->id;
        $user = User::find($user_id);
        $dataA = array(
            'driver' => $driverA,
            'booking' => $booking,
            'trip' => $tripA,
            'user' => $user
        );

        if($driverA != null)
        {
            if($request->send_email1 == 1 || $siteSettings[24]->value == 1)
            {
                Mail::to($driverA->email)->send(new DriverAssigned($dataA));
            }

        }
        if($request->send_email ==1 || $siteSettings[22]->value == 1)
        {
            Mail::to($booking->user->email)->send(new CustomerDriverAssign($dataA));
        }

        if($booking->return == 1)
        {
            $tripDataB = [
                'driver_id' => $request->return_driver_id,
                'collectable_by_driver' => $request->return_collectable_by_driver,
                'booking_id' => $booking->id,
                'booking_ref_id' => $booking->ref_id,
                'trip_ref_id' => $booking->ref_id.'B',
                'journey_type' => 'return',
                'journey_date' => $booking->return_date,
                'trip_status' => 0,
                'trip_earnings' => $earnnings[1],
            ];
            $tripB = Trip::updateOrCreate(
                ['booking_id' => $booking->id, 'journey_type' => 'return'],
                $tripDataB);
//            $tripB = Trip::create($tripDataB);

            $driverB = Driver::find($tripB->driver_id);
            $user_id = $booking->user->id;
            $user = User::find($user_id);
            $dataB = array(
                'driver' => $driverB,
                'booking' => $booking,
                'trip' => $tripB,
                'user' => $user
            );

            if($driverB != null)
            {
                if($request->send_email1 == 1 || $siteSettings[24]->value == 1)
                {

                    Mail::to($driverB->email)->send(new DriverAssigned($dataB));
                }

            }
            if($request->send_email == 1 || $siteSettings[22]->value == 1)
            {
                Mail::to($booking->user->email)->send(new CustomerDriverAssign($dataB));
            }
        }

        return redirect()->route('booking.bookings')->with('message', 'Driver Assigned');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function jobCompletion($id)
    {

        $booking = Booking::find($id);
        $invoices = array();
        if($booking->trips->isEmpty())
        {
            return Redirect::back()->withErrors(['Can Not complete a Job without assigning a Driver']);
        }
        if($booking->userTransaction == Null)
        {
            return Redirect::back()->withErrors(['Can Not complete a Job without Defining Payment']);
        }
        $booking->complete_status = 1;
        $booking->save();
        foreach($booking->trips as $trip)
        {
            $invoice = new Invoice();
            $invoice->booking_id = $trip->booking_id;
            $invoice->trip_id = $trip->id;
            if($trip->journey_type == 'origin')
            {
                $invoice->booking_date = $trip->booking->journey_date;
                $invoice->pick_up = $trip->booking->pickup_address;
                $invoice->drop_off = $trip->booking->dropoff_address;
            }
            else
            {
                $invoice->booking_date = $trip->booking->return_date;
                $invoice->pick_up = $trip->booking->return_pickup_address;
                $invoice->drop_off = $trip->booking->return_dropoff_address;
            }

            $invoice->driver_name = $trip->driver->name;
            $invoice->driver_phone = $trip->driver->phone_number;
            $invoice->customer_name = $trip->booking->user->name;
            $invoice->customer_phone = $trip->booking->user->phone;
            $invoice->customer_email = $trip->booking->user->email;
            if($trip->booking->userTransaction->payment_id == 'Cash')
            {
                $invoice->payment_type = $trip->booking->userTransaction->trans_id;
            }
            else
            {
                $invoice->payment_type = 'Paypal';
            }

            $invoice->status = 0;

            $invoice->total_amount = $trip->trip_earnings;


            if($trip->journey_type == 'origin')
            {
                if($trip->booking->from_to == 'loc')
                {
                    $invoice->booking_from = $trip->booking->location->display_name;
                    $invoice->booking_to   = $trip->booking->airport->display_name;
                }
                else
                {
                    $invoice->booking_to   = $trip->booking->location->display_name;
                    $invoice->booking_from = $trip->booking->airport->display_name;
                }
            }
            else
            {
                if($trip->booking->from_to == 'loc')
                {
                    $invoice->booking_from = $trip->booking->airport->display_name;
                    $invoice->booking_to   = $trip->booking->location->display_name;
                }
                else
                {
                    $invoice->booking_to   = $trip->booking->airport->display_name;
                    $invoice->booking_from = $trip->booking->location->display_name;
                }
            }
            $invoice->save();
            $invoices[] = $invoice;
        }


        try{
            $fileName = 'invoice_'.$booking->ref_id.'.pdf';
            $pdf = PDF::loadView('Backend.Booking.customerPdf', compact('invoices' , 'booking'));

            Storage::put('public/invoices/customer/'.$fileName, $pdf->output());
            $user_id = $booking->user->id;
            $user = User::find($user_id);
            $data = array(
                'booking' => $booking,
                'user' => $user
            );

            Mail::to($booking->user->email)->send(new BookingComplete($fileName, $data));
        }
        catch (\Exception $e){

        }

        return Redirect::back();

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

