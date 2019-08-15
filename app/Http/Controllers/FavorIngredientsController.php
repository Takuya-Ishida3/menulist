<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavorIngredientsController extends Controller
{
    public function store(Request $request , $id)
    {
        if(\Auth::check()){
            \Auth::user()->favor_ingredient($id);
            return back();
        }else{
            return redirect("/");
        }
        
    }
    
    public function destroy($id)
    {
        if(\Auth::check()){
            \Auth::user()->unfavor_ingredient($id);
            return back(); 
        }else{
            return redirect("/");
        }
    }
}