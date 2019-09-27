<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavorRecipesController extends Controller
{
    public function store(Request $request , $id)
    {
        if(\Auth::check()){
        //ログインユーザーならお気に入り
        \Auth::user()->favor_recipe($id);
        return back();
        }else{
        //未ログインならトップへ
        return redirect("/");
        }
    }
    
    public function destroy($id)
    {
        if(\Auth::check()){
        //ログインユーザーならお気に入り解除
        \Auth::user()->unfavor_recipe($id);
        return back();
        }else{
        //未ログインならトップへ
        return redirect("/");
        }
    }
}
