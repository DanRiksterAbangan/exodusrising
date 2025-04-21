<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('RohanAuth.server_list', [
            [
                'name' => 'Rohan Online',
                'ip' => '127.0.0.1',
                'status'=>"Online",
                'message' => "",
                'show' => true,
            ]
        ]);
    }
};
