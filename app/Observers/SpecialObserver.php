<?php

namespace App\Observers;

use App\Models\Special;
use App\Models\SpecialLogs;

class SpecialObserver
{
    /**
     * Handle the Special "created" event.
     *
     * @param  \App\Models\Special  $special
     * @return void
     */
    public function created(Special $special)
    {
        $log = new SpecialLogs;

        $log->action = 'INSERT';

        $log->saveOrFail();
    }

    /**
     * Handle the Special "updated" event.
     *
     * @param  \App\Models\Special  $special
     * @return void
     */
    public function updated(Special $special)
    {
        $log = new SpecialLogs;

        $log->action = 'UPDATE';

        $log->saveOrFail();
    }

    /**
     * Handle the Special "deleted" event.
     *
     * @param  \App\Models\Special  $special
     * @return void
     */
    public function deleted(Special $special)
    {
        $log = new SpecialLogs;

        $log->action = 'DELETE';

        $log->saveOrFail();
    }

    /**
     * Handle the Special "restored" event.
     *
     * @param  \App\Models\Special  $special
     * @return void
     */
    public function restored(Special $special)
    {
        //
    }

    /**
     * Handle the Special "force deleted" event.
     *
     * @param  \App\Models\Special  $special
     * @return void
     */
    public function forceDeleted(Special $special)
    {
        //
    }
}
