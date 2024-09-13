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
        Schema::create('clients_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->nullable();
$table->foreignId('report_to_client_id')->nullable();
$table->integer('is_report')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_reports');
    }
};
