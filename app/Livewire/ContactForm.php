<?php

namespace App\Livewire;

// use App\Jobs\sendMail;
use App\Mail\ContactFormMail;
use App\Mail\EnquiryReceivedMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
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
        // Queue disabled for now; mails are sent directly below.
        // sendMail::dispatch($contact);
        try {
            Mail::to('admagisterglobal@gmail.com')
                ->bcc('snhlrj5@gmail.com')
                ->send(new ContactFormMail($contact->name, $contact->email, (string) $contact->phone, (string) $contact->services, (string) $contact->message, (string) $contact->subject, (string) ($contact->source ?: 'contact')));

            Mail::to($contact->email, $contact->name)
                ->send(new EnquiryReceivedMail($contact->name, (string) $contact->message));
        } catch (\Throwable $e) {
            report($e);
        }

        session()->flash('success', 'Thank you! Your message has reached our team and we have emailed you a confirmation.');
        $this->reset(); // Clear the form
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
