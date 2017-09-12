<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TickerChangeEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;
    public $ticker_text;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($ticker_text)
    {
        $this->ticker_text = $ticker_text;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {

        return ['ticker-changed'];
    }

    public function broadcastAs()
    {
        return 'ticker-change-event';
    }
}
