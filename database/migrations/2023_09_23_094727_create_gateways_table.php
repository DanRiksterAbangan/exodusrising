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
        Schema::create('gateways', function (Blueprint $table) {
            $table->id();
            $table->string("server_id")->index();
            $table->integer("port");
            $table->integer("max_players");
            $table->integer("current_players");
            $table->string("status")->index()->default("offline");
            $table->string("version")->index()->default("1.0");
            $table->integer("setting_update")->index()->default(0);
            $table->boolean("shutdown_signal")->index()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gateways');
    }
};
