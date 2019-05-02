<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['id', 'name'];
    
    public function BelongsToRecipes() {
        return $this->belongsToMany(Recipe::class,'ingredients_for_cookings','ingredient_id','recipe_id')->withTimestamps();
    }
}
