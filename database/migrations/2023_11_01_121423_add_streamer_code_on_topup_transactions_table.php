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
        Schema::table('topup_transactions', function (Blueprint $table) {
            $table->string('streamer_code')->nullable()->index()->after('ref_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('topup_transactions', function (Blueprint $table) {
            $table->dropColumn('streamer_code');
        });
    }
};
