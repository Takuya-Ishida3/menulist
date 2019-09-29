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
        //チェックされた材料を取得
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
        if(\Auth::user()->admin_flag != 1){
            return back();
        }
        
        //材料を全て取得
        $ingredients = Ingredient::all();
        $meats = Ingredient::where('categories' , '肉類')->get();
        $seafoods = Ingredient::where('categories' , '魚介類')->get();
        $vegetables_fruits = Ingredient::where('categories' , '野菜・果物')->get();
        $others = Ingredient::where('categories' , 'その他')->get();
        
        return view('recipes.create',[
            'ingredients' => $ingredients,
            'meats' => $meats,
            'seafoods' => $seafoods,
            'vegetables_fruits' => $vegetables_fruits,
            'others' => $others
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
        //バリデーション
        $validate_recipe = $request->validate([
    	        'name' => 'required',
    	        'image_name' => 'required',
    	        'comment' => 'required'
    	]);
        
        //レシピの名前を取得
        $name ='';
        $name = $request->name;
        
        //レシピの画像を取得
        $image_name ='';
        $image_name = $request->image_name;
        $path ='';
        $path = Storage::disk('s3')->put('/',$image_name,'public');
        
        //レシピのコメントを取得
        $comment = '';
        $comment = $request->comment;
    
        //textboxのname(processes[])から配列を取得
        $processes = $request->processes; 
        
        //レシピを保存
        $recipe = new Recipe;
        $recipe->name = $name;
        $recipe->image_name = $path;
        $recipe->comment = "$comment";
        $recipe->save();
        
        //レシピidを取得
        $recipe_id = '';
        $recipe_id = $recipe->id;
        
        //材料のidを取得
        $ingredients = DB::table('ingredients')->pluck('id');
        
        foreach($ingredients as $ingredient){
            
            //材料の分量を取得
            $amount = $request->{"ingredient_id_" . $ingredient};
            
            if(!empty($amount)){
                //材料の分量を保存
                $ingredients_for_cooking = new IngredientsForCooking;
                $ingredients_for_cooking->recipe_id = $recipe_id;
                $ingredients_for_cooking->ingredient_id = $ingredient;
                $ingredients_for_cooking->required_amount = $amount;
                $ingredients_for_cooking->save();
            }
        }
            foreach ($processes as $process) {
                //工程を保存
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
        if(\Auth::check()){
            //ログインユーザーなら家族構成を取得
            $family_size = $user->family_size;
        }else{
            //ゲストなら1人とする
            $family_size = 1;
        }

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
        //レシピを取得
        $recipe = Recipe::find($id);
        //材料を全て取得
        $ingredients = Ingredient::all();
        $meats = Ingredient::where('categories' , '肉類')->get();
        $seafoods = Ingredient::where('categories' , '魚介類')->get();
        $vegetables_fruits = Ingredient::where('categories' , '野菜・果物')->get();
        $others = Ingredient::where('categories' , 'その他')->get();
        //工程を取得
        $processes = $recipe->get_processes()->get();
        //材料の分量を取得
        $required_amounts = $recipe->belongsToMany(Ingredient::class,'ingredients_for_cookings','recipe_id','ingredient_id')->where('recipe_id',$id)->withPivot('required_amount')->pluck('required_amount','ingredient_id')->toArray();
        $data = [
            'id' => $id,
            'recipe' => $recipe,
            'ingredients' => $ingredients,
            'meats' => $meats,
            'seafoods' => $seafoods,
            'vegetables_fruits' => $vegetables_fruits,
            'others' => $others,
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
        $validate_recipe = $request->validate([
    	        'name' => 'required',
    	        'image_name' => 'required',
    	        'comment' => 'required'
    	]);
        
        //レシピの名前を取得
        $name ='';
        $name = $request->name;
        
        //画像の名前を取得
        $image_name ='';
        $image_name = $request->image_name;
        
        //コメントを取得
        $comment = '';
        $comment = $request->comment;
        
        //画像のパスを取得
        $path ='';
        $path = Storage::disk('s3')->put('/',$image_name,'public');
        
        //材料のidを取得
        $ingredients = DB::table('ingredients')->pluck('id');
        
        //工程を取得
        $processes = $request->processes; //textboxのname(processes[])から配列を取得
        
        //レシピを保存する
        $recipe = Recipe::find($id);
        $recipe->name = $name;
        $recipe->image_name = $path;
        $recipe->comment = "$comment";
        $recipe->save();
        
        //更新するレシピの分量を一度削除する
        DB::table('ingredients_for_cookings')->where('recipe_id',$id)->delete();
        
        foreach($ingredients as $ingredient){
            //分量を取得
            $amount=$request->{"ingredient_id_" . $ingredient};;
            
            if(!empty($amount)){
                //分量を保存
                $ingredients_for_cooking = new IngredientsForCooking;
                $ingredients_for_cooking->recipe_id = $id;
                $ingredients_for_cooking->ingredient_id = $ingredient;
                $ingredients_for_cooking->required_amount = $amount;
                $ingredients_for_cooking->save();
            }
        }
        
        //工程を一度削除
        DB::table('how_to_cooks')->where('recipe_id',$id)->delete();
    	
        foreach ($processes as $process) {
            //工程を保存
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
            //レシピを取得
            $recipe = Recipe::find($id);
            //取得したレシピを削除
            $recipe->delete();
            return redirect("/");
        }else{
            return redirect("/");
        }
    }
    
}
