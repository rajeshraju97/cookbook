<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'dish_name',
        'dish_image',
        'dish_description',
        'dish_type_id',
        'no_members',
    ];

    public function dishType()
    {
        return $this->belongsTo(DishType::class, 'dish_type_id'); // 'dish_type_id' is the foreign key in dishes table
    }
}
