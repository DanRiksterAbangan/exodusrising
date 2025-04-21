<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('setting.change_name_cost', 1000);
        $this->migrator->add('setting.change_gender_cost', 1000);
    }
};
