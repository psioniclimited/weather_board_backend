<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TestEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;
    public $text;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['test-channel'];
    }

    public function broadcastAs()
    {
        return 'test-event';
    }
}
