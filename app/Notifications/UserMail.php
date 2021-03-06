<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;


class UserMail extends Notification
{

    //use Queueable;

    protected $user;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {


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
         return (new MailMessage)
                    ->greeting('hello')
                    ->line('you are notified')
                    ->action('Notification', 'https://mailtrap.io/inboxes/543348/messages/1140740908');
    }

    /**
     * Get the array representation of the notification.
     *s
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [

        ];
    }
}
