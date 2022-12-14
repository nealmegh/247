<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BillToDriver extends Mailable
{
    use Queueable, SerializesModels;

    public $fileName;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fileName, $data)
    {
        $this->data = $data;
        $this->fileName = $fileName;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Latest Bill From '.env('APP_NAME'),
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'Email.billGenerated',
            with: [
                'data' => $this->data
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [
            Attachment::fromStorage('public/invoices/driver/'.$this->fileName)
                ->as('Bill.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
