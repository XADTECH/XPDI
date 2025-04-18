<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $payment;

    /**
     * Create a new message instance.
     */
    public function __construct(array $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Checking Payment Confirmation Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        
        return new Content(
            view: 'emails.payment_success',
            with: ['payment' => $this->payment],
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
