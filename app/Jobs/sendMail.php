<?php

namespace App\Jobs;

use App\Livewire\ContactForm;
use App\Mail\ContactFormMail;
use App\Models\Contact;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class sendMail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    public $name;
    public $email;
    public $message;

    public function __construct(Contact $contact)
    {
        $this->name = $contact->name;
        $this->email = $contact->email;
        $this->message = $contact->message;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {


    //          Mail::raw('This is a test message', function ($message) {
    //     $message->to('rajbansh.snehal@gmail.com')
    //             ->subject('Test Email');
    // });

        // dd($this->name, $this->email, $this->message);
        Mail::to('rajbansh.snehal@gmail.com')
            ->bcc('snhlrj5@gmail.com') // <- fixed
            ->queue(new ContactFormMail($this->name, $this->email, $this->message));
    }
}
