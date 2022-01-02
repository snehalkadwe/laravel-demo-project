<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\models\Post;
use Carbon\Carbon;

class PostCreatedNotification extends Notification
{
    use Queueable;
    public $post;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
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
                    ->subject("New Post {$this->post->title} Created on: " . now()->format('m/d/Y'))
                    ->greeting("Hello {$notifiable->name},")
                    ->salutation('Yours Faithfully')
                    ->line('This is a friendly message that new post created on ' . Carbon::parse($this->post->created_at)->format('m/d/Y') . ' for you. Please visit our site')
                    ->line('Post name: ' . $this->post->title)
                    // ->action('Notification Action', url('/'))
                    ->action('Click to see post', route('post'))
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
