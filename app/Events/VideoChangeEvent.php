<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class VideoChangeEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;
    public $video_link_text;
    public $video_type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($video_link_text, $video_type)
    {
        $this->video_link_text = $video_link_text;
        $this->video_type = $video_type;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {

        return ['video-changed'];
    }

    public function broadcastAs()
    {
        return 'video-change-event';
    }
}
