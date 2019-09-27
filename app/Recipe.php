<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ingredient;

class Recipe extends Model
{
    protected $fillable = ['id', 'name','image_name', 'comment'];
    
    public function recipes() {
        //レシピを取得
        return $this->Recipe::all();
    }
    
    public function get_favoring_user()
    {
        //お気に入りしているユーザーを取得
        return $this->belongsToMany(User::class,'favorite_recipes','recipe_id','user_id')->withTimestamps();
    }
    
    public function get_processes()
    {
        //工程を取得
        return $this->hasMany(HowToCook::class);
    }
    
    public function count_processes()
    {
        //工程の数をカウント
        return $this->get_processes()->count();
    }
    
    public function get_ingredients()
    {
        //材料を取得
        return $this->belongsToMany(Ingredient::class,'ingredients_for_cookings','recipe_id','ingredient_id')->withTimestamps();
    }
    
}
