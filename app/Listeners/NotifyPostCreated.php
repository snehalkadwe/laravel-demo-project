<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PostCreated;
use App\Models\User;
use App\Notifications\PostCreatedNotification;
use Illuminate\Support\Facades\Notification;

class NotifyPostCreated
{
    public $delay = 30;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $users = User::all();
        foreach ($users as $user)
        {
            Notification::send($user, new PostCreatedNotification($event->post));
        }

    }
}
