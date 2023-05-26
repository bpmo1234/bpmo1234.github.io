<?php

namespace App\Console\Commands;

use App\Mail\SendEmail;
use App\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;



class TaskCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notification Email sending';

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
        
       
        //$TomorrowDate = strtotime(date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d')))));

        $TodayDate=strtotime(date('Y-m-d'));

         $users = DB::table('users')
                    ->where('status',1)
                    ->where('exp_date','=',$TodayDate)
                    ->get();

         if (count( $users)<=0)
         {
            echo "No Subscription renew data found";
            exit;
         }  

         foreach ($users as $user_data) {
             
            Mail::to($user_data->email)->send(new SendEmail($user_data));     
         } 

        $this->info('Demo:Cron Cummand Run successfully!');
    }
}
