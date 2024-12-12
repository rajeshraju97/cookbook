<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Ingredient extends Model
{
    //
    // Define the attributes that can be mass assigned
    use HasFactory;
    protected $primaryKey = 'dish_id'; // Specify the primary key column
    protected $fillable = ['dish_name', 'ingredients', 'no_members', 'total_price'];

}
