<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parking extends Model
{
    use HasFactory;
    protected $fillable = ['vehicle_id', 'parking_lot_id', 'check_in_at', 'status'];
}
