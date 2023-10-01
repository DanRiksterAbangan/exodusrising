<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gateway_farmings', function (Blueprint $table) {
            $table->id();
            $table->boolean("autoloot")->default(true);
            $table->boolean("autoloot_ipticket")->default(true);
            $table->boolean("autoloot_armor")->default(true);
            $table->boolean("autoloot_weapon")->default(true);
            $table->boolean("autoloot_acce")->default(true);
            $table->smallInteger("min_armor")->default(36);
            $table->smallInteger("max_armor")->default(42);
            $table->smallInteger("min_weapon")->default(36);
            $table->smallInteger("max_weapon")->default(39);
            $table->smallInteger("min_weapon_percent")->default(12);
            $table->smallInteger("max_weapon_percent")->default(14);
            $table->smallInteger("min_acce")->default(36);
            $table->smallInteger("max_acce")->default(42);
            $table->json("autoloot_talisman")->default("");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gateway_farmings');
    }
};
