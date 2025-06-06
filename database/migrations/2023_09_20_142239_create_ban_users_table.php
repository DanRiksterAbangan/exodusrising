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
        Schema::create('ban_users', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->unsigned()->index();
            $table->string("reason");
            $table->integer("banned_by")->unsigned()->index();
            $table->dateTime("until_date")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ban_users');
    }
};
