<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('RohanAuth.restrict_exe_version', true);
        $this->migrator->add('RohanAuth.exe_version', '');
        $this->migrator->add('RohanAuth.restrict_nation', true);
        $this->migrator->add('RohanAuth.nation', '');
    }
};
