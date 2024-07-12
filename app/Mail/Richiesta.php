<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class Richiesta extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $body;
    public $name;

    /**
     * Create a new message instance.
     */
    public function __construct($_email,$_body, $_name)
    {
        //
        $this->email = $_email;
        $this->body = $_body;
        $this->name = $_name;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(

            from: new Address($this->email),
            subject: 'Richiesta passaggio a revisore',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.mailRichiesta',
            with: ['nome' => $this->name, 'body' => $this->body],
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
