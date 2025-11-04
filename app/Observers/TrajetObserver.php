<?php

namespace App\Observers;

use App\Models\Trajet;
use App\Models\Recharge;

class TrajetObserver
{
    public function saved(Trajet $trajet)
    {
        $this->recalculerRatioBatterie();
    }

    protected function recalculerRatioBatterie()
    {
        $trajets = Trajet::orderBy('id')->get(['id', 'pourcentage_batterie']);
        $prev = null;

        foreach ($trajets as $t) {
            if ($prev === null) {
                Recharge::where('id', $t->id)->update(['ratio_batterie' => null]);
            } else {
                Recharge::where('id', $t->id)->update([
                    'ratio_batterie' => $t->pourcentage_batterie - $prev
                ]);
            }
            $prev = $t->pourcentage_batterie;
        }
    }
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
