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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
$table->string('code')->nullable();
$table->integer('chat_count')->nullable();
$table->integer('search_count')->nullable();
$table->integer('hidden')->nullable();
$table->integer('show_img')->nullable();
$table->integer('special_member')->nullable();
$table->integer('edit_name')->nullable();
$table->integer('favorite_count')->nullable();
$table->integer('expire_duration')->nullable();
$table->integer('is_expire')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
