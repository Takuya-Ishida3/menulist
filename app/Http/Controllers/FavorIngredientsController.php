<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavorIngredientsController extends Controller
{
    public function store(Request $request , $id)
    {
        \Auth::user()->favor_ingredient($id);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->unfavor_ingredient($id);
        return back();
    }
}