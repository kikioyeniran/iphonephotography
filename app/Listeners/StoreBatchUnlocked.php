<?php

namespace App\Listeners;

use App\Providers\BatchUnlocked;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreBatchUnlocked
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
     * @param  \App\Providers\BatchUnlocked  $event
     * @return void
     */
    public function handle(BatchUnlocked $event)
    {
        //
    }
}
