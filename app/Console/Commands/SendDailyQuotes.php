<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use App\Notifications\SendDailyQuotesNotofication;
use Illuminate\Support\Facades\Notification;


class SendDailyQuotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quotes:send-daily-quotes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will send quotes daily to all the users registered
        to this application';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dailyQuotes = [
            'Mahatma Gandhi' => 'Live as if you were to die tomorrow. Learn as if you were to live forever.',
            'Friedrich Nietzsche' => 'That which does not kill us makes us stronger.',
            'Theodore Roosevelt' => 'Do what you can, with what you have, where you are.',
            'Oscar Wilde' => 'Be yourself; everyone else is already taken.',
            'William Shakespeare' => 'This above all: to thine own self be true.',
            'Napoleon Hill' => 'If you cannot do great things, do small things in a great way.',
            'Milton Berle' => 'If opportunity doesn’t knock, build a door.'
        ];

        // generate the random key and get its quote in data variable
        $getRandamQuote = array_rand($dailyQuotes);
        $data = $dailyQuotes[$getRandamQuote];


        $users = User::all();
        // foreach ($users as $user)
        // {
                // 1st method to send notification to all registered users
        //     $user->notify(new SendDailyQuotesNotofication($data));

        // }

        // or we can use collection each method (another way to send notification)
        //  2nd way to send notification to all registered user
        $users->each(function ($user) use ($data) {
            Notification::send($user, new SendDailyQuotesNotofication($data));
        });

        $this->info('Successfully sent daily quote to everyone.');

    }
}
