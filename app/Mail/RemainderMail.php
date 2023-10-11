<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RemainderMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $reminder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reminder)
    {
        $this->reminder = $reminder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reminder', ['reminder' => $this->reminder])
            ->from($address = config('electo.mail_from_address'), $name = config('app.name', 'Laravel'))
            ->subject(config('app.name', 'Laravel'));
    }
}
