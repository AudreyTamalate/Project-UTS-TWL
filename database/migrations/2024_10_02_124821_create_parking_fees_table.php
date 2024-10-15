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
        Schema::create('parking_fees', function (Blueprint $table) {
            $table->id();
            $table->char('parking_fee_id',5);
            $table->char('parking_lot_id',5);
            $table->text('vehicle_type');          
            $table->integer('initial_entry_amount');    
            $table->integer('increment');               
            $table->integer('max_flat_amount');         
            $table->integer('penalty_duration');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_fees');
    }
};