<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use Illuminate\Support\Facades\Storage;
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
        
        //もしキーワードが入力されている場合
        if(!empty($keyword))
        {   
            //料理名から検索
            $recipes =Recipe::where('name', 'like', '%'.$keyword.'%')->paginate(5);

/**
            //材料名から検索
            $checkwords = $request->ingredients;
            foreach ($checkwords as $checkword) {
            $ingredient = Ingredient::where('name', 'like', '%'.$checkword.'%');
            $recipe = $ingredient->belongsToMany(Recipe::class,ingredients_for_cooking,ingredient_id,recipe_id)->withTimestamps()->paginate(5);
            }
            
**/
            
        }else{//キーワードが入力されていない場合
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
        
        return view('recipes.create',[
            'recipe' => $recipe    
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
        
        $recipe = new Recipe;
        $recipe->name = $name;
        $recipe->image_name = $path;
        $recipe->save();
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
