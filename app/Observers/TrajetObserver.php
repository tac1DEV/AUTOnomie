<?php

namespace App\Observers;

use App\Models\Trajet;
use App\Models\Recharge;

class TrajetObserver
{


    /**
     * Handle the Trajet "created" event.
     */
    public function created(Trajet $trajet): void
    {
        //
    }

    /**
     * Handle the Trajet "updated" event.
     */
    public function updated(Trajet $trajet): void
    {
        //
    }

    /**
     * Handle the Trajet "deleted" event.
     */
    public function deleted(Trajet $trajet): void
    {
        //
    }

    /**
     * Handle the Trajet "restored" event.
     */
    public function restored(Trajet $trajet): void
    {
        //
    }

    /**
     * Handle the Trajet "force deleted" event.
     */
    public function forceDeleted(Trajet $trajet): void
    {
        //
    }
}
