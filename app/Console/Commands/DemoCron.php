<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        \Log::info("Cron is working fine!");

        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */

        $this->info('Demo:Cron Command Run successfully!');

        // Getting all the schedule surveys with team and owners
        // $surveySchedules = SurveySchedule::whereDate('end_date', Carbon::now()->addHour(config('app.survey_closing_reminder_interval'))->toDateString())->with('team.owner')->get();

        // Looping the all scheduled surveys
        // $surveySchedules->each(function($surveySchedule) {
        //     Notification::send($surveySchedule->team->owner, new UserSurveyClosing());
        // });

    }
}
