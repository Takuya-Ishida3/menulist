<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['id', 'name','image_name'];
    
    public function recipes() {
        return $this->Recipe::all();
    }
}
