<?php

namespace App\Jobs;

use App\Mail\ContactFormMail;
use App\Mail\EnquiryReceivedMail;
use App\Models\Contact;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

/**
 * Runs for every site form (footer enquiry and /contact): notifies the admin
 * inbox and sends the visitor a thank-you.
 */
class sendMail implements ShouldQueue
{
    use Queueable;

    public $name;
    public $email;
    public $phone;
    public $service;
    public $subject;
    public $source;
    public $messageText;

    public function __construct(Contact $contact)
    {
        $this->name = $contact->name;
        $this->email = $contact->email;
        $this->phone = (string) $contact->phone;
        $this->service = (string) $contact->services;
        $this->subject = (string) $contact->subject;
        $this->source = (string) ($contact->source ?: 'contact');
        $this->messageText = (string) $contact->message;
    }

    public function handle()
    {
        Mail::to('admagisterglobal@gmail.com')
            ->bcc('snhlrj5@gmail.com')
            ->queue(new ContactFormMail($this->name, $this->email, $this->phone, $this->service, $this->messageText, $this->subject, $this->source));

        Mail::to($this->email, $this->name)
            ->queue(new EnquiryReceivedMail($this->name, $this->messageText));
    }
}
