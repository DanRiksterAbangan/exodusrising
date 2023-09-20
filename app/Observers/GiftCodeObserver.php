<?php

namespace App\Observers;

use App\Models\GiftCode;

class GiftCodeObserver
{
    /**
     * Handle the GiftCode "created" event.
     */
    public function created(GiftCode $giftCode): void
    {
        //
    }

    /**
     * Handle the GiftCode "updated" event.
     */
    public function updated(GiftCode $giftCode): void
    {
        if($giftCode->status == "claimed"){
            $giftCode->claimedBy->increment("Point",$giftCode->rps_amount);
        }
    }

    /**
     * Handle the GiftCode "deleted" event.
     */
    public function deleted(GiftCode $giftCode): void
    {
        //
    }

    /**
     * Handle the GiftCode "restored" event.
     */
    public function restored(GiftCode $giftCode): void
    {
        //
    }

    /**
     * Handle the GiftCode "force deleted" event.
     */
    public function forceDeleted(GiftCode $giftCode): void
    {
        //
    }
}
