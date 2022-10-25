<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Driver;
use App\Mail\BookingUpdated;
use App\Mail\DriverAssigned;
use App\Models\SiteSettings;
use App\Models\User;
use App\Models\UserTransaction;
use Illuminate\Http\Request;
use App\Mail\BookingSuccessful;
use Illuminate\Support\Facades\Mail;

use Config;

use Session;
use Redirect;


class UserTransactionController extends Controller
{


    public function paymentStatus(Request $request, $bookingId)
    {
//        $paymentId = $request->orderData.purchase_units[0].payments.captures[0].id;
        $paymentId = $request->transaction_id;
//        $type = $request->get('type');
//
        $booking = Booking::find($bookingId);
//        $paymentId = '12313213231';
        if($booking->final_price != null)
        {
            $amount = $booking->final_price;
        }
        else
        {
            $amount = $booking->price;
        }
        $transID = 'Paypal';

        $userTransaction = UserTransaction::updateOrCreate(
            [   'amount' => $amount,
                'booking_id' => $booking->id,
                'trans_id' => $transID,
                'payment_id' => $paymentId
            ]
        );
//
//        $userTransaction->amount = $amount;
//        $userTransaction->booking_id = $booking->id;
//        $userTransaction->trans_id = $transID;
//        $userTransaction->payment_id = $paymentId;
//        $userTransaction->save();
        $booking->confirm = 1 ;
        $booking->user_transaction_id = $userTransaction->id;
        $booking->save();
//
//                $data = array(
//                            'booking' => $booking,
//                        );
//
////                Mail::to($booking->user->email)->send(new BookingSuccessful($data));


        return 200;

    }


    public function cashPayment(Request $request)
    {

        $siteSettings = SiteSettings::all();
        $bookingId = $request->id;
        $booking = Booking::find($bookingId);
        $userTransaction = UserTransaction::updateOrCreate(
            ['booking_id' => $booking->id],
            [   'amount' => $booking->final_price,
                'trans_id' => $request->type,
                'payment_id' => 'Cash'
            ]
        );
//        dd($userTransaction);
//        $userTransaction->amount = $booking->final_price;
//        $userTransaction->booking_id = $bookingId;
//        $userTransaction->trans_id = $request->type;
//        $userTransaction->payment_id = 'Cash';
//        $userTransaction->save();
        $booking->confirm = 1 ;
        $booking->user_transaction_id = $userTransaction->id;
        $booking->save();
        $driverId = $booking->driver_id;
        $driver = Driver::find($driverId);

        $user_id = $booking->user->id;
        $user = User::find($user_id);

        $data = array(
            'driver' => $driver,
            'booking' => $booking,
            'user' => $user
        );

//        if($driver != null)
//        {
//            if($request->send_email1 == 1 || $siteSettings[24]->value == 1)
//            {
//                Mail::to($driver->email)->send(new DriverAssigned($data));
//            }
//
//        }
        if($request->send_email ==1 || $siteSettings[22]->value == 1)
        {
            Mail::to($booking->user->email)->send(new BookingUpdated($data));
        }

        $routeName = ($request->paidBy == 'Customer')?'userProfile':'booking.bookings';
        return redirect()->route($routeName);

    }
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
     * @param  \App\UserTransaction  $userTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(UserTransaction $userTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserTransaction  $userTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTransaction $userTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserTransaction  $userTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserTransaction $userTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserTransaction  $userTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTransaction $userTransaction)
    {
        //
    }
}
