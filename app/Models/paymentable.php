<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentable extends Model
{
    use HasFactory;
    protected $fillable = ['paymentable_id'];
}
