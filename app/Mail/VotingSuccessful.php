<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VotingSuccessful extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $success_msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($success_msg)
    {
        $this->success_msg = $success_msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.voting-successful', ['success_msg' => $this->success_msg])
            ->from($address = config('electo.mail_from_address'), $name = config('app.name', 'Laravel'))
            ->subject('Success');
    }
}
