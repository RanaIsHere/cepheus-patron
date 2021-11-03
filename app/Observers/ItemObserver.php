<?php

namespace App\Observers;

use App\Models\HealthLogs;
use App\Models\Items;

class ItemObserver
{
    /**
     * Handle the Items "created" event.
     *
     * @param  \App\Models\Items  $items
     * @return void
     */
    public function created(Items $items)
    {
        $log = new HealthLogs;

        $log->item_id = $items->id;
        $log->expired_stock = $items->item_stock;
        $log->expired_date = $items->expiration_date;

        $log->saveQuietly();
    }

    /**
     * Handle the Items "updated" event.
     *
     * @param  \App\Models\Items  $items
     * @return void
     */
    public function updated(Items $items)
    {
        $log = HealthLogs::where('item_id', $items->id)->first();

        if ($items->pull_status != 1) {
            $log->expired_stock = $items->item_stock;

            $log->saveQuietly();
        }
    }

    /**
     * Handle the Items "deleted" event.
     *
     * @param  \App\Models\Items  $items
     * @return void
     */
    public function deleted(Items $items)
    {
        //
    }

    /**
     * Handle the Items "restored" event.
     *
     * @param  \App\Models\Items  $items
     * @return void
     */
    public function restored(Items $items)
    {
        //
    }

    /**
     * Handle the Items "force deleted" event.
     *
     * @param  \App\Models\Items  $items
     * @return void
     */
    public function forceDeleted(Items $items)
    {
        //
    }
}
