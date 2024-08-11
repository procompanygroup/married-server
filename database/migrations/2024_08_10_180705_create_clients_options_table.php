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
        Schema::create('clients_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable();
$table->foreignId('property_id')->nullable();
$table->foreignId('option_id')->nullable();
$table->text('val_str')->nullable();
$table->integer('val_int')->nullable();
$table->dateTime('val_date')->nullable();
$table->text('notes')->nullable();
$table->string('type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_options');
    }
};
