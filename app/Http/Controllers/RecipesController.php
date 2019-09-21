<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\IngredientsForCooking;
use App\Ingredient;
use App\HowToCook;
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
        //キーワードを取得
        $keyword = $request->input('keyword');
        $checkwords = $request->ingredients;
        
        
        //もしキーワードが入力されている場合
        if(!empty($keyword)) {   
            //料理名から検索
            $recipes =Recipe::where('name', 'like', '%'.$keyword.'%')->orderBy('created_at','desc')->paginate(6);
            $search_flag = 1;
        }
        
        if(!empty($checkwords)) {
            //材料名から検索
            foreach ($checkwords as $checkword) {
            $recipes = DB::table('recipes')
                            ->select('recipes.image_name', 'recipes.name', 'recipes.comment','recipes.id')
                            ->join('ingredients_for_cookings','recipes.id','ingredients_for_cookings.recipe_id')
                            ->join('ingredients','ingredients_for_cookings.ingredient_id','ingredients.id')
                            ->where('ingredients.name',$checkword)->orderBy('recipes.created_at','desc')->paginate(6);
            }
            $search_flag = 1;
        }
        
        if(empty($keyword)&&empty($checkword)){
            //キーワードが入力されていない場合
            $recipes = Recipe::orderBy('created_at','desc')->paginate(6);
            $search_flag = 0;
        }
        
        return view ('recipes.index', [
            'recipes' => $recipes,
            'keyword' => $keyword,
            'search_flag' => $search_flag
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
        $ingredients = Ingredient::all();
        //$ingredients_for_cooking = new IngredientsForCooking;
        
        return view('recipes.create',[
            'recipe' => $recipe,
            'ingredients' => $ingredients,
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
        
        $comment = '';
        $comment = $request->comment;
        
        $path ='';
        $path = Storage::disk('s3')->put('/',$image_name,'public');
        
        $ingredients = DB::table('ingredients')
                            ->pluck('id');
        //dd($ingredients);
                    
        //where('id' , $request->{'ingredient_id_' . $ingredients_id})->get;
        
        //dd($ingredients_id);  ok
        
        $processes = $request->processes; //textboxのname(processes[])から配列を取得
        
        $recipe = new Recipe;
        $recipe->name = $name;
        $recipe->image_name = $path;
        $recipe->comment = "$comment";
        $recipe->save();
        
        $recipe_id = '';
        $recipe_id = $recipe->id;
        
           foreach($ingredients as $ingredient){
            $amount=$request->$ingredient;
            if(!empty($amount)){
               
                $ingredients_for_cooking = new IngredientsForCooking;
                $ingredients_for_cooking->recipe_id = $recipe_id;
                $ingredients_for_cooking->ingredient_id = $ingredient;
                $ingredients_for_cooking->required_amount = $amount;
                $ingredients_for_cooking->save();
            }
            else{
            }
            
            }
    
   /**     
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
    **/
        
            foreach ($processes as $process) {
                $how_to_cook = new HowToCook;
                $how_to_cook->recipe_id = $recipe_id;
                $how_to_cook->process = $process;
                $how_to_cook->save();
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
        //レシピを取得
        $recipe = Recipe::find($id);
        //材料を取得
        $ingredients = $recipe->get_ingredients;
        //工程を取得
        $processes = $recipe->get_processes;
        //1人に必要な材料の量を取得
        $required_amounts = $recipe->belongsToMany(Ingredient::class,'ingredients_for_cookings','recipe_id','ingredient_id')->where('recipe_id',$id)->withPivot('required_amount')->pluck('required_amount','ingredient_id')->toArray();
        //ユーザーの家族構成を取得
        $user = \Auth::user();
        $family_size = $user->family_size;

        $data = [
            'recipe' => $recipe,
            'ingredients' => $ingredients,
            'processes' => $processes,
            'family_size' => $family_size,
            'required_amounts' => $required_amounts
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
        $recipe = Recipe::find($id);
        $ingredients = Ingredient::all();
        $processes = $recipe->get_processes()->get();
        $required_amounts = $recipe->belongsToMany(Ingredient::class,'ingredients_for_cookings','recipe_id','ingredient_id')->where('recipe_id',$id)->withPivot('required_amount')->pluck('required_amount','ingredient_id')->toArray();
        $data = [
            'id' => $id,
            'recipe' => $recipe,
            'ingredients' => $ingredients,
            'processes' => $processes,
            'required_amounts' => $required_amounts
        ];
        return view('recipes.edit', $data);
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
        $name ='';
        $name = $request->name;
        
        $image_name ='';
        $image_name = $request->image_name;
        
        $comment = '';
        $comment = $request->comment;
        
        $path ='';
        $path = Storage::disk('s3')->put('/',$image_name,'public');
        
        $ingredients = DB::table('ingredients')
                            ->pluck('id');
        //dd($ingredients);
                    
        //where('id' , $request->{'ingredient_id_' . $ingredients_id})->get;
        
        //dd($ingredients_id);  ok
        
        $processes = $request->processes; //textboxのname(processes[])から配列を取得
        
        $recipe = Recipe::find($id);
        $recipe->name = $name;
        $recipe->image_name = $path;
        $recipe->comment = "$comment";
        $recipe->save();
        
        DB::table('ingredients_for_cookings')->where('recipe_id',$id)->delete();
        foreach($ingredients as $ingredient){
        $amount=$request->$ingredient;
        if(!empty($amount)){
            $ingredients_for_cooking = new IngredientsForCooking;
            $ingredients_for_cooking->recipe_id = $id;
            $ingredients_for_cooking->ingredient_id = $ingredient;
            $ingredients_for_cooking->required_amount = $amount;
            $ingredients_for_cooking->save();
        }
        }
            
        DB::table('how_to_cooks')->where('recipe_id',$id)->delete();
        foreach ($processes as $process) {
            $how_to_cook = new HowToCook;
            $how_to_cook->recipe_id = $id;
            $how_to_cook->process = $process;
            $how_to_cook->save();
        }
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Auth::check()){
            $recipe = Recipe::find($id);
            $recipe->delete();
            return redirect("/");
        }else{
            return redirect("/");
        }
    }
    
}
