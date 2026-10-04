<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Thank-you sent to whoever submits a site form (footer or /contact).
 */
class EnquiryReceivedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public string $name, public string $messageText = '')
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thanks for contacting Ad Magister',
            replyTo: [new Address('info@admagister.com', 'Ad Magister')],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'mail.enquiry-received');
    }
}
