<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'dish_id',
        'user_id',
        'ingredients',
        'no_members',
        'status',
        'total_amount',
        'applied_coupon_id',
        'discount_amount',
    ];


    public function dishes()
    {
        return $this->belongsTo(Dishes::class, 'dish_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function user_address()
    {
        return $this->belongsTo(UserAddress::class, 'user_id');
    }
}
