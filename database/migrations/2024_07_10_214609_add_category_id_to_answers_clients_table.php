<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. add_pointsrate_to_points_trans_table
     */
    public function up(): void
    {
        Schema::table('answers_clients', function (Blueprint $table) {
            //category_id
            $table->foreignId('category_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('answers_clients', function (Blueprint $table) {
            //
        });
    }
};
