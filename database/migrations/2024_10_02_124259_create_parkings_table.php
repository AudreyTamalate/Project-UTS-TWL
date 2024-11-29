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
        Schema::create('parkings', function (Blueprint $table) {
            $table->id();
            $table->char('vehicle_id',5);
            $table->char('parking_id',5);
            $table->char('parking_lot_id',5);
            $table->datetime('check_in_at');
            $table->char('status',10);
            $table->timestamps();

            $table->foreign('vehicle_id')->references('vehicle_id')->on('vehicles')->onDelete('cascade'); // Foreign Key to vehicles
            $table->foreign('parking_lot_id')->references('parking_lot_id')->on('parking_lots')->onDelete('cascade'); // Foreign Key to parking_lots
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkings');
    }
};