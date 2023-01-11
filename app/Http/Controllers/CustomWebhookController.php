<?php

namespace App\Http\Controllers;

use App\Mail\BookingSuccessful;
use App\Models\Booking;
use App\Models\UserTransaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use Laravel\Cashier\Subscription;

class CustomWebhookController extends CashierController
{
    protected function handlePaymentIntentSucceeded(array $payload)
    {
        $id = $payload['data']['object']['description'];
        $booking = Booking::find($id);

        $paymentId = $payload['data']['object']['id'];

        if($booking->final_price != null)
        {
            $amount = $booking->final_price;
        }
        else
        {
            $amount = $booking->price;
        }
        $transID = 'Stripe';

        $userTransaction = UserTransaction::updateOrCreate(
            [   'amount' => $amount,
                'booking_id' => $booking->id,
                'trans_id' => $transID,
                'payment_id' => $paymentId
            ]
        );
        $booking->confirm = 1 ;
        $booking->user_transaction_id = $userTransaction->id;
        $booking->save();
        $data = array(
            'booking' => $booking,
        );
        try {
            Mail::to($booking->user->email)->send(new BookingSuccessful($data));
        }
        catch (Exception $e)
        {

        }


        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/custom.log'),
        ])->info($payload['data']['object']['id'].' '.$payload['data']['object']['description']);
//        Log::info($payload['data']['object']['id'], $payload['data']['object']['description']);
        return $this->successMethod();
    }
}
