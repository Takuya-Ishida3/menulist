<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\IngredientsForCooking;
use App\Ingredient;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Image;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$value = $request->name;
        
        //キーワードを取得
        $keyword = $request->input('keyword');
        $checkwords = $request->ingredients;
        
        //もしキーワードが入力されている場合
        if(!empty($keyword)) {   
            //料理名から検索
            $recipes =Recipe::where('name', 'like', '%'.$keyword.'%')->paginate(5);
        }
        
        if(!empty($checkwords)) {
            //材料名から検索
            foreach ($checkwords as $checkword) {
            $recipes = DB::table('recipes')
                            ->join('ingredients_for_cookings','recipes.id','ingredients_for_cookings.recipe_id')
                            ->join('ingredients','ingredients_for_cookings.ingredient_id','ingredients.id')
                            ->where('ingredients.name',$checkword)->paginate(5);
            }
        }
        
        if(empty($keyword)&&empty($checkword)){
            //キーワードが入力されていない場合
            $recipes = Recipe::orderBy('created_at','desc')->paginate(5);
        }
        
        return view ('recipes.index', [
            'recipes' => $recipes,
            'keyword' => $keyword,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipe = new Recipe;
        //$ingredient = new Ingredient;
        //$ingredients_for_cooking = new IngredientsForCooking;
        
        return view('recipes.create',[
            'recipe' => $recipe,
            //'ingredient' => $ingredient,
            //'ingredients_for_cooking' => $ingredients_for_cooking,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $name ='';
        $name = $request->name;
        
        $image_name ='';
        $image_name = $request->image_name;
        
        $path ='';
        $path = Storage::disk('s3')->put('/',$image_name,'public');
        
        $values = $request->ingredients; //checkboxのname(ingredients[])から配列を取得
        
        $recipe = new Recipe;
        $recipe->name = $name;
        $recipe->image_name = $path;
        $recipe->save();
        
        $recipe_id = '';
        $recipe_id = $recipe->id;
        
        foreach ($values as $value) {
            //$valueとingredientsテーブルのnameが一致するもののidを取得
	        $ingredient_id = Ingredient::where('name', $value)->value('id');
	        $ingredients_for_cooking = '';
            $ingredients_for_cooking = new IngredientsForCooking;
            $ingredients_for_cooking->recipe_id = $recipe_id;
            $ingredients_for_cooking->ingredient_id = $ingredient_id;
            //$ingredients_for_cooking->required_amount = $required_amount;
            $ingredients_for_cooking->required_amount = '1';
            $ingredients_for_cooking->save();
        }
        
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        $data = [
            'recipe' => $recipe,
        ];
        return view('recipes.show', $data);
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
