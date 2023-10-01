<?php

use App\Enums\GatewayMessageType;
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
        Schema::create('gateway_messages', function (Blueprint $table) {
            $table->id();
            $table->string("type")->index();
            $table->text("message");
            $table->integer("message_type")->index()->default(GatewayMessageType::Blue);
            $table->boolean("enable")->default(true);
            $table->string("args")->default("");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gateway_messages');
    }
};
