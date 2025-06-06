<?php

namespace App\Observers;

use App\Models\TopupTransaction;
use Illuminate\Support\Facades\Cache;

class TopupTransactionObserver
{
    /**
     * Handle the TopupTransaction "created" event.
     */
    public function created(TopupTransaction $topupTransaction): void
    {
        //
    }

    /**
     * Handle the TopupTransaction "updated" event.
     */
    public function updated(TopupTransaction $topupTransaction): void
    {

    }

    /**
     * Handle the TopupTransaction "deleted" event.
     */
    public function deleted(TopupTransaction $topupTransaction): void
    {
        //
    }

    /**
     * Handle the TopupTransaction "restored" event.
     */
    public function restored(TopupTransaction $topupTransaction): void
    {
        //
    }

    /**
     * Handle the TopupTransaction "force deleted" event.
     */
    public function forceDeleted(TopupTransaction $topupTransaction): void
    {
        //
    }
}
