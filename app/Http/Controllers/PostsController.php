<?php

namespace App\Http\Controllers;

use App\Events\GreetEvent;
use App\Jobs\SendDemoMailJob;
use App\Mail\SendDemoMail;
use App\Models\Posts;
use App\Models\User;
use App\Notifications\TestEnrollment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function QueryHandler()
    {
        $query = Posts::query();
        $id = $query->max('id');
        // $data = $query->where('id', $id);
        // $data->delete();
        // delete();
        // $data = 
        // dd($query->max('id'));

        // user 1 
        // $query = User::query();
        // $user_posts = $query->with('UserPosts')
        //             ->where('id', 5)
        //             ->get();
        //             // dd($user_posts->UserPosts);
        //             foreach ($user_posts as $key => $value) {
        //                 print_r($value);
        //             }
        //             die();
        // $postperuser = $query->with('PostPerUser')
        //             ->where('user_id', 2)
        //             ->get();
        // print_r($postperuser);
        // die();

        $users = User::all();

        $enrollmentData = [
            'body' => 'You have received a new test notification',
            'enroll_text' => 'Access your profile and update your details',
            'url' => url('/'),
            'thankyou' => 'Thank You. 15 days for enroll so enroll now',
        ];

        // $user->notify(new TestEnrollment($enrollmentData));
        
        // Notification::send($users, new TestEnrollment($enrollmentData));

        // send a mail demoMail without an event 

        // Mail::to($users->first()->email)->send(new SendDemoMail());

        // sending it from jobs

        $newjob = (new SendDemoMailJob($users->first()->email))->delay(now()->addSeconds(60));
        dispatch($newjob);

        // return "Hurray";
        // event(new GreetEvent("Hello How are you?"));
    }

    public function cronHandler(){

    }
}