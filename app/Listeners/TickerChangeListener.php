<?php

namespace App\Listeners;

use App\Events\TickerChangeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TickerChangeListener
{
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
     * @param  TickerChangeEvent  $event
     * @return void
     */
    public function handle(TickerChangeEvent $event)
    {
        //
    }
}
