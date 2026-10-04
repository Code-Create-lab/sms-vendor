<?php

namespace App\Livewire;

use App\Jobs\sendMail;
use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ContactForm extends Component
{

    #[Validate('required|string|max:120')]
    public $name;
    #[Validate('required|email|max:190')]
    public $email;
    #[Validate('required|string|max:20')]
    public $phone;

    #[Validate('nullable|string|max:2000')]
    public $message;

    #[Validate('accepted', message: 'Please authorize to receive notifications.')]
    public $consent = false;

    public $selectedLOB = [];


    public function toggleLOB($item)
    {
        if (in_array($item, $this->selectedLOB)) {
            $this->selectedLOB = array_diff($this->selectedLOB, [$item]);
        } else {
            $this->selectedLOB[] = $item;
        }
    }

    public function save()
    {

        // dd();
        $validated =  $this->validate();

        // Save to DB
        $contact = Contact::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'phone' => $validated['phone'],
            'services' => json_encode(array_values($this->selectedLOB)),
            'message' => $validated['message'] ?? null,
            'source'  => 'contact',
        ]);


        // Emails the admin inbox and sends the visitor a thank-you.
        sendMail::dispatch($contact);

        session()->flash('success', 'Thank you! Your message has reached our team and we have emailed you a confirmation.');
        $this->reset(); // Clear the form
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
