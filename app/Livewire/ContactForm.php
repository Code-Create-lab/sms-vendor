<?php

namespace App\Livewire;

use App\Jobs\sendMail;
use App\Mail\ContactFormMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ContactForm extends Component
{

    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $email;
    #[Validate('required')]
    public $message;

    public function save()
    {

        $validated =  $this->validate();

        // Save to DB
        $contact = Contact::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'message' => $validated['message'],
        ]);


        // Mail::to('rajbansh.snehal@gmail.com')->send(new ContactFormMail($this->name, $this->email, $this->message));

        // Dispatch the email job
        sendMail::dispatch($contact);

        session()->flash('success', 'Your message has been sent!');
        $this->reset(); // Clear the form
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
