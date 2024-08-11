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
        Schema::create('optionsvalues', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
$table->integer('is_active')->nullable();
$table->string('value')->nullable();
$table->integer('value_int')->nullable();
$table->text('notes')->nullable();
$table->foreignId('property_id')->nullable();
$table->string('type')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('optionsvalues');
    }
};
