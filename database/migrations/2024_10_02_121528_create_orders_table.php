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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable();
            $table->foreignId('package_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('confirm_date')->nullable();
            $table->string('trans_num')->nullable();           
            $table->string('notes')->nullable();
            $table->string('payment_method')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
