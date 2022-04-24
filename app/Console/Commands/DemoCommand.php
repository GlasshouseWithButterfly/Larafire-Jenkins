<?php

namespace App\Console\Commands;

use App\Mail\SendDemoMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DemoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:popup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Displays a message every minute.';

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
        $users = User::all();
        Mail::to($users->first()->email)->send(new SendDemoMail());
        echo "Operation done. yuhuu!";
    }
}
