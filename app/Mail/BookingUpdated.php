<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingUpdated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from( env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->cc('info247ae@gmail.com')->subject('Your Booking has been updated @' .env('APP_NAME').'')->view('Email.bookingUpdated')->with('data', $this->data);
    }
}
