<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['id', 'name','image_name'];
    
    public function recipes() {
        return $this->Recipe::all();
    }
    
    public function get_favoring_user()
    {
        return $this->belongsToMany(User::class,'favorite_recipes','recipe_id','user_id')->withTimestamps();
    }
    
    
}
