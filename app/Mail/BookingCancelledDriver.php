<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingCancelledDriver extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
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

        return $this->from( env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->cc('info247ae@gmail.com')->subject('Your
        Trip has been cancelled @'.env('APP_NAME').'')->view('Email.bookingCancelledDriver')->with('data', $this->data);

    }
}
