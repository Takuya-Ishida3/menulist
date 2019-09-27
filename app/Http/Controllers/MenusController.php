<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Recipe;
use App\Ingredient;
use Carbon\carbon;


class MenusController extends Controller
{
    public function index(Request $request)
    {
        if (\Auth::check()){
            //ログインユーザーを取得
            $user = \Auth::user();
            //月曜から日曜の日付を取得
            $monday = new Carbon('monday this week');
            $tuesday = new Carbon('tuesday this week');
            $wednesday = new Carbon('wednesday this week');
            $thursday = new Carbon('thursday this week');
            $friday = new Carbon('friday this week');
            $saturday = new Carbon('saturday this week');
            $sunday = new Carbon('sunday this week');
            //月曜から日曜の献立を取得
            $monday_menus = $user->get_menu()->where('YYYYMMDD',$monday)->get();
            $tuesday_menus = $user->get_menu()->where('YYYYMMDD',$tuesday)->get();
            $wednesday_menus = $user->get_menu()->where('YYYYMMDD',$wednesday)->get();
            $thursday_menus = $user->get_menu()->where('YYYYMMDD',$thursday)->get();
            $friday_menus = $user->get_menu()->where('YYYYMMDD',$friday)->get();
            $saturday_menus = $user->get_menu()->where('YYYYMMDD',$saturday)->get();
            $sunday_menus = $user->get_menu()->where('YYYYMMDD',$sunday)->get();
            //お気に入りした材料のidを取得
            $favorite_ingredients = $user->get_favorite_ingredient()->pluck('ingredient_id');
            
            $data = [
                'user' => $user,
                'monday' => $monday,
            	'tuesday' => $tuesday,
            	'wednesday' => $wednesday,
            	'thursday' => $thursday,
            	'friday' => $friday,
            	'saturday' => $saturday,
            	'sunday' => $sunday,
            	'monday_menus' => $monday_menus,
            	'tuesday_menus' => $tuesday_menus,
            	'wednesday_menus' => $wednesday_menus,
            	'thursday_menus' => $thursday_menus,
            	'friday_menus' => $friday_menus,
            	'saturday_menus' => $saturday_menus,
            	'sunday_menus' => $sunday_menus,
            	'favorite_ingredients' => $favorite_ingredients
            ];
        return view('menus.index', $data);
        }else{
            return redirect("/");
        }
    }
    
    public function store(Request $request,$id)
    {
        $replace = [
            // '置換前の文字' => '置換後の文字',
            '年' => '-',
            '月' => '-',
            '日' => '-',
        ];
        //日付の入力は必須
        $date = $request->validate([
    	        'date' => 'required'
    	]);
    	//フォームに入力された日付を取得
        $date = $request->date;
        //日付をフォーマット
        $date = strtr($date, $replace);
        
        //献立に登録
        \Auth::user()->associate_with_menu($id,$date);
        return back();
    }
    
    public function destroy($id)
    {
        //献立から削除
        \Auth::user()->unassociate_with_menu($id);
        return back();
    }
    
    public function create(Request $request)
    {
        //ログインユーザーのidを取得
        $user_id = \Auth::user()->id;
        //お気に入りの材料のidを取得
    	$favorite_ingredients = \Auth::user()->get_favorite_ingredient()->pluck('ingredient_id');
    	if($favorite_ingredients->isEmpty() == 1){
    	    //お気に入りの材料がなければページを戻す
    	    return back();
    	}
    	$date = $request->validate([
    	        //日付の入力は必須
    	        'date' => 'required'
    	]);
    	//フォームに入力された日付を取得
        $date = $request->date;
    	$replace = [
            // '置換前の文字' => '置換後の文字',
            '年' => '-',
            '月' => '-',
            '日' => '-',
        ];
        //日付をフォーマット
        $date = strtr($date, $replace);
        //レシピを全て取得
        $recipes = Recipe::all();
        
        foreach($recipes as $recipe){
        //お気に入りの材料が含まれているレシピのidを取得
    	$recomended_recipes = $recipe->belongsToMany(Ingredient::class,'ingredients_for_cookings','recipe_id','ingredient_id')->wherePivot('ingredient_id',$favorite_ingredients)->pluck('recipe_id')->toArray();
    	$recomended_recipes_id[] = $recomended_recipes;
        }
        //配列を１次元に
        $recomended_recipes_id = array_collapse($recomended_recipes_id);
        //レシピidの重複を削除
        $recomended_recipes_id = array_unique($recomended_recipes_id);
        //レシピidの個数をカウント
        $cnt = count($recomended_recipes_id);
        
        if($cnt == 0){
            return back();
        }
        
        if($cnt<=5){
            $random_int = mt_rand(1,$cnt);//最小1、最大$cnt以上
        }else{
            $random_int = mt_rand(1,5);//最小1、最大5
        }
        
        //$random_intの数だけレシピidをランダム取得
        $keys = array_rand($recomended_recipes_id,$random_int);
        
    	foreach($keys as $key){
    	    //献立を登録
    	    $menu = new Menu;
    	    $menu->user_id = $user_id;
    	    $menu->recipe_id = $recomended_recipes_id[$key];
    	    $menu->YYYYMMDD = $date;
    	    $menu->save();
    	}
	    return back();
    }
}
