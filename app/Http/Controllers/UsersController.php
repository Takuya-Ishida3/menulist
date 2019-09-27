<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Ingredient;

class UsersController extends Controller
{
    public function show($id)
    {
        //ログインユーザーの取得
        $user = User::find($id);
        //好みのレシピの取得
        $favorite_recipes = $user->get_favorite_recipes()->paginate(6);
        //好みのレシピの個数をカウント
        $count = $user->get_favorite_recipes()->get();
        $data = [
            'user' => $user,
            'favorite_recipes' => $favorite_recipes,
            'count' => $count
        ];
        
        return view('users.show',$data);
    }
    
    public function edit($id)
    {
        //ログインユーザーの取得
        $user = User::find($id);
        //材料を全て取得
        $ingredients = Ingredient::all();
        $meats = Ingredient::where('categories' , '肉類')->get();
        $seafoods = Ingredient::where('categories' , '魚介類')->get();
        $vegetables_fruits = Ingredient::where('categories' , '野菜・果物')->get();
        $others = Ingredient::where('categories' , 'その他')->get();
        
        $data= [
                'user' => $user,
                'ingredients' => $ingredients,
                'meats' => $meats,
                'seafoods' => $seafoods,
                'vegetables_fruits' => $vegetables_fruits,
                'others' => $others
            ];
        
        return view('users.edit',$data);
    }
    
    public function update(Request $request, $id)
    {
        //入力値(家族構成)を取得
        $family_size = $request->family_size;
        //ログインユーザーの情報を保存
        $user = User::find($id);
        $user->family_size = $family_size;
        $user->save();
        
        return back();
    }
}
