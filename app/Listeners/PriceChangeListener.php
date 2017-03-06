<?php

namespace App\Listeners;

use App\Events\PriceChangeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PriceChangeListener
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
     * @param  PriceChangeEvent  $event
     * @return void
     */
    public function handle(PriceChangeEvent $event)
    {
        //
    }
}
