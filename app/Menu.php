<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['id', 'user_id', 'recipe_id', 'YYYYMMDD'];
}
