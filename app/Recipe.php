<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ingredient;

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
    
    public function get_processes()
    {
        return $this->hasMany(HowToCook::class);
    }
    
    public function count_processes()
    {
        return $this->get_processes()->count();
    }
    
}
