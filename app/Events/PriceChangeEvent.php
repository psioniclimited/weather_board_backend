<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PriceChangeEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;
    public $item_text;
    public $item_price;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($item_text, $item_price)
    {
        $this->item_text = $item_text;
        $this->item_price = $item_price;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {

        return ['price-changed'];
    }

    public function broadcastAs()
    {
        return 'price-change-event';
    }
}
