<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavorIngredientsController extends Controller
{
    public function store(Request $request , $id)
    {
        if(\Auth::check()){
            //ログインしていればお気に入りする
            \Auth::user()->favor_ingredient($id);
            return back();
        }else{
            //未ログインならトップへ
            return redirect("/");
        }
        
    }
    
    public function destroy($id)
    {
        if(\Auth::check()){
            //ログインしていればお気に入り解除
            \Auth::user()->unfavor_ingredient($id);
            return back(); 
        }else{
            //未ログインならトップへ
            return redirect("/");
        }
    }
}