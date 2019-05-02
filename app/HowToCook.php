<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HowToCook extends Model
{
    protected $fillable = ['id', 'recipe_id','process'];
}
