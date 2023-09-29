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
        Schema::create('player_connections', function (Blueprint $table) {
            $table->id();
            $table->string("machine_id")->nullable()->index();
            $table->string("pcode")->nullable()->index();
            $table->string("login_id")->nullable()->index();
            $table->string("character_name")->nullable()->index();
            $table->string("remote_address")->nullable()->index();
            $table->string("status")->default("online")->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_connections');
    }
};
