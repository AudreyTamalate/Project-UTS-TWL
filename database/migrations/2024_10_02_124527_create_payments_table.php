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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->char('payment_id',5);
            $table->char('transaction_id',5);
            $table->integer('amount');
            $table->char('status',10);
            $table->timestamps();

            $table->foreign('transaction_id')->references('transaction_id')->on('transactions')->onDelete('cascade'); // Foreign Key to transactions
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};