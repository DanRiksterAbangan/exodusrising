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
        Schema::create('topup_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->index();
            $table->string("ref_id")->index();
            $table->decimal("amount", 10, 2)->default(0);
            $table->string("image");
            $table->string("notes")->default("");
            $table->decimal("before_rps", 10, 2)->default(0);
            $table->decimal("after_rps", 10, 2)->default(0);
            $table->enum("status",["pending","approved","rejected"])->default("pending");
            $table->integer("processed_by")->nullable()->index();
            $table->dateTime("processed_date")->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topup_transactions');
    }
};
