<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavorRecipesController extends Controller
{
    public function store(Request $request , $id)
    {
        if(\Auth::check()){
        \Auth::user()->favor_recipe($id);
        return back();
        }else{
        return redirect("/");
        }
    }
    
    public function destroy($id)
    {
        if(\Auth::check()){
        \Auth::user()->unfavor_recipe($id);
        return back();
        }else{
        return redirect("/");
        }
    }
}
