<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parkingLot extends Model
{
    use HasFactory;
    protected $fillable = ['parking_lot_id','capacity', 'latitude', 'longitude'];
}
