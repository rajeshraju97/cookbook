<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishType extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'category_name',
        'type_name',
    ];

    public function dishes()
    {
        return $this->hasMany(Dishes::class, 'dish_type_id'); // 'dish_type_id' is the foreign key in dishes table
    }
}
