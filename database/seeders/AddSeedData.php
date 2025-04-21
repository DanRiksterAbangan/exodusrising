<?php

namespace Database\Seeders;

use App\Models\Gateway;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddSeedData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gateway::insert([
            [
                "server_id" => "1",
                "port" => "101",
                "max_players" => "500",
                "current_players" => "0",
                "status" => "offline",
                "version" => "1.0",
                "setting_update" => false,
            ],
            [
                "server_id" => "2",
                "port" => "102",
                "max_players" => "500",
                "current_players" => "0",
                "status" => "offline",
                "version" => "1.0",
                "setting_update" => false,
            ],
            [
                "server_id" => "3",
                "port" => "103",
                "max_players" => "500",
                "current_players" => "0",
                "status" => "offline",
                "version" => "1.0",
                "setting_update" => false,
            ],
            [
                "server_id" => "4",
                "port" => "104",
                "max_players" => "500",
                "current_players" => "0",
                "status" => "offline",
                "version" => "1.0",
                "setting_update" => false,
            ],
            [
                "server_id" => "5",
                "port" => "105",
                "max_players" => "500",
                "current_players" => "0",
                "status" => "offline",
                "version" => "1.0",
                "setting_update" => false,
            ],

        ]);
    }
}
