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
        Schema::create('gift_codes', function (Blueprint $table) {
            $table->id();
            $table->string("code")->index();
            $table->decimal("rps_amount", 10, 2)->default(0);
            $table->string("description");
            $table->enum("status", ["active", "inactive","claimed"])->default("active");
            $table->integer("created_by")->nullable()->index();
            $table->integer("claimed_by")->nullable()->index();
            $table->dateTime("claimed_at")->nullable()->index();
            $table->dateTime("expired_at")->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gift_codes');
    }
};
