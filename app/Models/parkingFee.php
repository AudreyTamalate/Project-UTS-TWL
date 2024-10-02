<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parkingFee extends Model
{
    use HasFactory;
    protected $fillable = ['parking_lot_id', 'vehicle_type', 'initial_entry_amount','increment', 'max_flat_amount', 'penalty_duration'];
}

