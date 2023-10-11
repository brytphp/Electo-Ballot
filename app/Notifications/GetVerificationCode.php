<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;
use NotificationChannels\Hellio\HellioChannel;
use NotificationChannels\Hellio\HellioMessage;

class GetVerificationCode extends Notification implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $electo_verification_code;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($electo_verification_code)
    {
        $this->electo_verification_code = $electo_verification_code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $send_by = [];

        // if ($notifiable->election->sms == 'yes') {
        //     array_push($send_by, HellioChannel::class);
        // }

        if ($notifiable->election->email == 'yes') {
            array_push($send_by, 'mail');
        }

        return $send_by;
        // return ['mail',];
    }

    public function toHellioSMS($notifiable)
    {
        return (new HellioMessage)
            ->from($notifiable->election->sms_sender_name)
            ->content($this->electo_verification_code);
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->view(
            'maileclipse::templates.verificationCode',
            [
                'data' => $notifiable,
                'code' => $this->electo_verification_code,
            ]
        )

            ->greeting('🖐'.$notifiable->first_name)
            ->from($address = config('electo.mail_from_address'), $name = $notifiable->election->email_sender_name)
            ->subject('Verification Code');

        // return (new MailMessage)
        //     ->greeting('Hi! ' . $notifiable->first_name)
        //     ->from($address = 'brytphp@gmail.com', $name = $notifiable->election->email_sender_name)
        //     ->subject('Verification Code')
        //     ->line($this->electo_verification)
        //     ->action('Verify', url('/'));
    }

    /**
     * Get the array representation of the notification.
     *
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
