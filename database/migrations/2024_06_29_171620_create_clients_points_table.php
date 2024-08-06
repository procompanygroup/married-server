<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients_points', function (Blueprint $table) {
            $table->id();
            $table->integer('points_sum')->nullable()->default(0);
            $table->integer('gift_sum')->nullable()->default(0);
            $table->foreignId('category_id')->nullable();
            $table->foreignId('client_id')->nullable();
            $table->foreignId('level_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_points');
    }
};
