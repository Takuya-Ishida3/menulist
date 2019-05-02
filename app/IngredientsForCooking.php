<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientsForCooking extends Model
{
    protected $fillable = ['id', 'recipe_id','ingredient_id','required_amount'];
}
