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
        Schema::create('gateway_firecrackers', function (Blueprint $table) {
            $table->id();
            $table->integer("firecracker_type")->index();
            $table->integer("reward_type")->index();
            $table->integer("stack");
            $table->string("stats");
            $table->text("description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gateway_firecrackers');
    }
};
