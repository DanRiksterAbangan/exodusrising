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
        Schema::create('gateway_firewalls', function (Blueprint $table) {
            $table->id();
            $table->integer("packet_type")->index();
            $table->string("packet_rule")->index();
            $table->string("status")->default("active")->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gateway_firewalls');
    }
};
