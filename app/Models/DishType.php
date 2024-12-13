<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishType extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'dish_type',
        'type_name',
    ];

    public function dishes()
    {
        return $this->belongsTo(Dish::class);
    }
}
