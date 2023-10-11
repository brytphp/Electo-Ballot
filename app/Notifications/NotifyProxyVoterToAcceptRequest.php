<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;

class NotifyProxyVoterToAcceptRequest extends Notification implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $voter;

    protected $proxy;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($voter, $proxy)
    {
        $this->voter = $voter;
        $this->proxy = $proxy;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $smg = $this->voter->first_name.' '.$this->voter->other_names.' requests you vote on his/her behalf in the upcoming '.$this->voter->election->election.'. Login with '.$notifiable->email.' or '.local_phone_number($notifiable->phone).' and '.$this->voter->voter_id.' to vote.  ';

        return (new MailMessage)
            ->greeting('🖐'.$notifiable->first_name)
            ->from($address = config('electo.mail_from_address'), $name = $notifiable->election->email_sender_name)
            ->subject('Proxy Vote Request')
            ->line($smg)
            ->action('CLICK HERE TO ACCEPT', route('proxy.accept', ['voter' => $this->proxy->voter->id, 'proxy_request' => $this->proxy->id]));

        return (new MailMessage)->view(
            'maileclipse::templates.prompToAcceptProxy',
            [
                'data' => $notifiable,
                'proxy' => $this->proxy,
            ]
        )
            ->greeting('🖐&nbsp; Hi! '.$notifiable->first_name)
            ->from($address = config('electo.mail_from_address'), $name = $notifiable->election->email_sender_name)
            ->subject('Proxy Vote Request');
    }

    /**
     * Get the array representation of the notification.
    //  *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
