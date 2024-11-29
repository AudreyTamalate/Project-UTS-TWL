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
        Schema::create('paymentables', function (Blueprint $table) {
            $table->id();
            $table->char('paymentable_id',5);
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign Key to users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paymentables');
    }
};