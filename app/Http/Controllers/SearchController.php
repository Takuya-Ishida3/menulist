<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use\App\Recipe;
use\App\Ingredient;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        //キーワードを取得
        $keyword = $request->keyword;
        
        //もしキーワードが入力されている場合
        if(!empty($keyword))
        {   
            //料理名から検索
            $recipes =Recipe::where('name', 'like', '%'.$keyword.'%')->paginate(5);

/** これはチェックボックスの検索機能なので後で移す
            //材料名から検索
            
            ⑴requestから材料名を配列で取得する？
            $checkwords = $request->ingredients[]
            foreach ($checkwords as $checkword) {
            $ingredient = Ingredient::where('name', 'like', '%'.$checkword.'%');
            $ recipe = $ingredient->belongsToMany(Recipe::class,ingredients_for_cooking,ingredient_id,recipe_id)->withTimestamps()->paginate(5);
            }

**/

        }else{//キーワードが入力されていない場合
            $recipes = Recipe::all()->paginate(5);
        }
        
        //検索フォームへ
        return view('recipes.index',[
            'recipes' => $recipes,
            'keyword' => $keyword,
            ]);
    }
}
