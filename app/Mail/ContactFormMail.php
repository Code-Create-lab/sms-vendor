<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $name, $email, $phone, $service, $messageText, $subjectLine, $source;

    public function __construct(string $name, string $email, string $phone, string $service, string $messageText = '', string $subjectLine = '', string $source = 'contact')
    {

        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->service = $service;
        $this->messageText = $messageText;
        $this->subjectLine = $subjectLine;
        $this->source = $source;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $form = $this->source === 'footer' ? 'Website enquiry' : 'Contact form';

        return new Envelope(
            subject: $form . ': ' . ($this->subjectLine !== '' ? $this->subjectLine : $this->name),
            replyTo: [new Address($this->email, $this->name)],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.contact',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'service' => $this->service,
                'messageText' => $this->messageText,
                'subjectLine' => $this->subjectLine,
                'source' => $this->source,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
