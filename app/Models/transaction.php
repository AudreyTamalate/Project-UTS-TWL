<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $fillable = ['parking_id', 'amount', 'transaction_type', 'status', 'transaction_at', 'paid_at', 'duration'];
}
