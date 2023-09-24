<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('RohanAuth.maintenance', false);
        $this->migrator->add('RohanAuth.allowed_on_maintenance', []);
    }
};
