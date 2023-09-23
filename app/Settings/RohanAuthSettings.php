<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class RohanAuthSettings extends Settings
{
    public bool $restrict_exe_version;
    public string $exe_version;
    public bool $restrict_nation;
    public string $nation;

    public array $server_list;


    public static function group(): string
    {
        return 'RohanAuth';
    }
}
