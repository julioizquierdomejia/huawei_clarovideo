<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponWinner extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id',
        'coupon_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
