<?php

namespace App\Listeners;

use App\Events\GreetEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ListenGreetEvent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // dd("hugf");
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\GreetEvent  $event
     * @return void
     */
    public function handle(GreetEvent $event)
    {
        return $event;
    }
}