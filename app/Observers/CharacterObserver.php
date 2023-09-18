<?php

namespace App\Observers;

use App\Models\Character;
use Illuminate\Support\Facades\Cache;

class CharacterObserver
{
    /**
     * Handle the Character "created" event.
     */
    public function created(Character $character): void
    {
        //
    }

    /**
     * Handle the Character "updated" event.
     */
    public function updated(Character $character): void
    {
        Cache::forget("characters_".$character->user_id);
    }

    /**
     * Handle the Character "deleted" event.
     */
    public function deleted(Character $character): void
    {
        //
    }

    /**
     * Handle the Character "restored" event.
     */
    public function restored(Character $character): void
    {
        //
    }

    /**
     * Handle the Character "force deleted" event.
     */
    public function forceDeleted(Character $character): void
    {
        //
    }
}
