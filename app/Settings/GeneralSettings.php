<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public int $change_name_cost = 1000;
    public int $change_gender_cost = 1000;

    public static function group(): string
    {
        return 'setting';
    }
}
