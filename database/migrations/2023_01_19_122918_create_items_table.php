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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer("type");
            $table->string("image");
            $table->string("name");
            $table->text("description");
            $table->integer("stack");
            $table->string("category");
            $table->decimal("amount",30,2);
            $table->integer("discount")->default(0);
            $table->integer("added_by");
            $table->boolean("show")->default(false);
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
        Schema::dropIfExists('items');
    }
};
