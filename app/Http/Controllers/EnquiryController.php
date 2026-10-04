<?php

namespace App\Http\Controllers;

use App\Jobs\sendMail;
use App\Models\Contact;
use Illuminate\Http\Request;

/**
 * Footer "Pitch us your idea" form. Saves the enquiry, then sendMail emails the
 * admin inbox and sends the visitor a thank-you. Answers JSON for the fetch()
 * submit in layouts/footer.blade.php and redirects back when JS is off.
 */
class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        // Honeypot: real visitors never see or fill "website".
        if ($request->filled('website')) {
            return $this->respond($request, '');
        }

        $data = $request->validate([
            'name'    => ['required', 'string', 'max:120'],
            'email'   => ['required', 'email', 'max:190'],
            'subject' => ['nullable', 'string', 'max:190'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $contact = Contact::create($data + ['source' => 'footer']);

        sendMail::dispatch($contact);

        return $this->respond($request, $data['name']);
    }

    private function respond(Request $request, string $name)
    {
        $message = 'Thank you' . ($name !== '' ? ', ' . $name : '')
            . '! Your message has reached our team and we have emailed you a confirmation. We will get back to you shortly.';

        if ($request->expectsJson()) {
            return response()->json(['message' => $message]);
        }

        return back()->with('amf_status', $message)->withFragment('amf-collab-title');
    }
}
