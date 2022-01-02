<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\User;

class SendDailyQuotesNotofication extends Notification
{
    use Queueable;

    public $quote;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
       $this->quote = $data;
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

        // $mailMessage = (new MailMessage)
        //  ->subject('Cognitive Dynamism Assessment')
            // ->line('Quote of the day : ' . $this->quote)
            // ->action('Notification Action', url('/'));
        // return $mailMessage;

        return (new MailMessage)
                    ->greeting("Holla {$notifiable->name}, ")
                    ->subject('Daily Quotes')
                    ->line('This daily quotes helps you to stay encouraged')
                    ->line('Quote of the day : ' . $this->quote)
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
