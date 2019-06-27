<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavorRecipesController extends Controller
{
    public function store(Request $request , $id)
    {
        \Auth::user()->favor_recipe($id);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->unfavor_recipe($id);
        return back();
    }
}