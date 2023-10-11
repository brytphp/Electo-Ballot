<?php

namespace App\Events;

use App\Electo\CollationCenter;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DrawChart implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($election = null)
    {
        $collation = new CollationCenter();
        $this->message = $collation->seriesChart();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [config('electo.electo_channel').'-chart-channel'];
    }

    public function broadcastAs()
    {
        return config('electo.electo_channel').'-chart-event';
    }
}
