<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer("item_id");
            $table->integer("item_type");
            $table->integer("stacks");
            $table->decimal("amount",30,2);
            $table->decimal("original_amount",30,2);
            $table->decimal("from_rps",30,2);
            $table->decimal("to_rps",30,2);
            $table->integer("discount");
            $table->integer("user_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
