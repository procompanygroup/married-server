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
        Schema::create('clients_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable();
$table->foreignId('package_id')->nullable();
$table->integer('chat_count')->nullable();
$table->integer('search_count')->nullable();
$table->integer('hidden')->nullable();
$table->integer('show_img')->nullable();
$table->integer('special_member')->nullable();
$table->integer('edit_name')->nullable();
$table->integer('favorite_count')->nullable();
$table->integer('expire_duration')->nullable();
$table->integer('chat_count_remain');
$table->integer('search_count_remain');
$table->integer('favorite_count_remain')->nullable();
$table->integer('status')->nullable();
$table->dateTime('start_date')->nullable();
$table->dateTime('end_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_packages');
    }
};
