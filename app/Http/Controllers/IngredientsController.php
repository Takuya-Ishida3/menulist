<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use App\Recipe;
use Carbon\carbon;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ログイン
        $user = \Auth::user();
        //家族構成を取得
        $family_size = $user->value('family_size');
        //材料を全て取得
        $ingredients = Ingredient::all();
        //材料のidを取得
        $ingredient_ids = $ingredients->pluck('id');
        //初期化
        $required_amounts[] = "";
        //今週の月曜の日付を取得
        $monday = new Carbon('monday this week');
        //今週の日曜の日付を取得
        $sunday = new Carbon('sunday this week');
        //月曜から日曜に献立があるか確認
        if($user->get_menu()->whereBetween('YYYYMMDD',[$monday, $sunday])->exists()){
            $exist = true;
        }else{
            $exist= false;
        }
        //今週の月曜から日曜の献立に登録されているレシピidを取得
        $recipes_ids = $user->get_menu()->whereBetween('YYYYMMDD',[$monday, $sunday])->pluck('recipes.id');
        foreach($recipes_ids as $recipes_id)
        {
            //今週の献立のレシピを取得
            $recipe = Recipe::find($recipes_id);
            //レシピに必要な材料とその分量を取得
            $required_amounts[] = $recipe->belongsToMany(Ingredient::class,'ingredients_for_cookings','recipe_id','ingredient_id')->withPivot('required_amount')->pluck('required_amount','ingredient_id')->toArray();
        }
        
        foreach($ingredient_ids as $ingredient_id)
        {
            //必要な材料の分量を合計、家族全員で必要な量に換算
            $sum[$ingredient_id] = array_sum(array_column($required_amounts,$ingredient_id))*$family_size;
        }
        
        $data = [
            'user' => $user,
            'ingredients' => $ingredients,
            'sum' => $sum,
            'exist' => $exist
        ];
        
        return view ('menus.ingredients_list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
