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
        Schema::create('options_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('option_id')->nullable();
            $table->foreignId('group_id')->nullable();
            $table->foreignId('property_id')->nullable();
            $table->integer('priority')->nullable();
            $table->text('notes')->nullable();           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options_groups');
    }
};
