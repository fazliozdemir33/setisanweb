<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

        public function __construct(array $data)
    {
        $this->data = $data;
    }

        public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Setisan İletişim Formu: ' . ($this->data['subject'] ?? 'Yeni Mesaj'),
            replyTo: [
                new \Illuminate\Mail\Mailables\Address($this->data['email'], $this->data['name'])
            ]
        );
    }

        public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
        );
    }

        public function attachments(): array
    {
        return [];
    }
}

