<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class OrderReceived extends Mailable
{
    public function __construct(public Order $order) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New quote request #'.$this->order->id.' from '.$this->order->name,
            replyTo: [$this->order->email],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.order-received');
    }
}
