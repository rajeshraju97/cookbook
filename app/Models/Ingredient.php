<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Ingredient extends Model
{
    //
    // Define the attributes that can be mass assigned
    use HasFactory;

    protected $fillable = ['dish_id', 'ingredients', 'no_of_members'];


    public function dishes()
    {
        return $this->belongsTo(Dishes::class, 'dish_id');
    }

}
