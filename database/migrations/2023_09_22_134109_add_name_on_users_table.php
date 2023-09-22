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
        Schema::connection("sqlsrv_user")->table('dbo.tuser', function (Blueprint $table) {
            $table->string("name")->nullable()->index()->after("user_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection("sqlsrv_user")->table('dbo.tuser', function (Blueprint $table) {
            $table->dropIndex("dbo_tuser_name_index");
            $table->dropColumn("name");
        });
    }
};
