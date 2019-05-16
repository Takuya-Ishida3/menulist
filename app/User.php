<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public function get_favorite_recipes()
    {
        return $this->belongsToMany(Recipe::class,'favorite_recipes','user_id','recipe_id')->withTimestamps();
    }
    
    public function favor_recipe($recipeId)
    {
        // 既にお気に入りしているかの確認
        $exist = $this->is_favoring($recipeId);
    
        if ($exist) {
            // 既にお気に入りしていれば何もしない
            return false;
        } else {
            // お気に入りしていなければお気に入りする
            $this->get_favorite_recipes()->attach($recipeId);
            return true;
        }
    }
    
    public function unfavor_recipe($recipeId)
    {
        // 既にお気に入りしているかの確認
        $exist = $this->is_favoring($recipeId);
    
        if ($exist) {
            // 既にお気に入りしていれば解除する
            $this->get_favorite_recipes()->detach($recipeId);
            return true;
        } else {
            // お気に入りされていなければ何もしない
            return false;
        }
    }
    
    public function is_favoring($recipeId)
    {
        return $this->get_favorite_recipes()->where('recipe_id', $recipeId)->exists();
    }
    
    public function get_favorite_ingredient()
    {
    	return $this->belongsToMany(Ingredient::class, 'favorite_ingredients', 'user_id', 'ingredient_id')->withTimestamps();
    }
    
    public function favor_ingredient($ingredientId)
    {
    	//既にお気に入りしているかの確認
    	$exist = $this->is_favoring_ingredient($ingredientId);
    
    	if($exist){
        	//既にお気に入りしていれば何もしない
        	return false;
        	}else{
        	//お気に入りしていなければお気に入りする
        	$this->get_favorite_ingredient()->attach($ingredientId);
        	return true;
    	    }
    }

    public function unfavor_ingredient($ingredientId)
    {
    	//既にお気に入りしているかの確認
    	$exist = $this->is_favoring_ingredient($ingredientId);
    
    	if($exist){
        	//既にお気に入りしていれば解除する
        	$this->get_favorite_ingredient()->detach($ingredientId);
        	return true;
        	}else{
        	//お気に入りしていなければ何もしない
        	return false;
    	    }
    }

    public function is_favoring_ingredient($ingredientId)
    {
    	return $this->get_favorite_ingredient()->where('ingredient_id', $ingredientId)->exists();
    }
    
    
}
