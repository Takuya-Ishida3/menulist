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

        $user = \Auth::user();
        //$recipes = $user->get_menu()->get();
        //$today = Carbon::today('Asia/Tokyo');
        //$dow = $today->dayOfWeekIso;
        $monday = new Carbon('monday this week');
        $tuesday = new Carbon('tuesday this week');
        $wednesday = new Carbon('wednesday this week');
        $thursday = new Carbon('thursday this week');
        $friday = new Carbon('friday this week');
        $saturday = new Carbon('saturday this week');
        $sunday = new Carbon('sunday this week');
        $monday_menus = $user->get_menu()->where('YYYYMMDD',$monday)->get();
        $tuesday_menus = $user->get_menu()->where('YYYYMMDD',$tuesday)->get();
        $wednesday_menus = $user->get_menu()->where('YYYYMMDD',$wednesday)->get();
        $thursday_menus = $user->get_menu()->where('YYYYMMDD',$thursday)->get();
        $friday_menus = $user->get_menu()->where('YYYYMMDD',$friday)->get();
        $saturday_menus = $user->get_menu()->where('YYYYMMDD',$saturday)->get();
        $sunday_menus = $user->get_menu()->where('YYYYMMDD',$sunday)->get();
        
        $data = [
            'user' => $user,
            //'recipes' => $recipes,
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
        	'sunday_menus' => $sunday_menus
        	//'dow' => $dow
        ];
        
        return view('menus.index', $data);
        }else{
            return redirect("/");
        }
    }
    
    public function store(Request $request,$id)
    {
        $date = $request->date;//フォームに入力された日付を取得
        $replace = [
            // '置換前の文字' => '置換後の文字',
            '年' => '-',
            '月' => '-',
            '日' => '-',
        ];
        $date = strtr($date, $replace);
        
        \Auth::user()->associate_with_menu($id,$date);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->unassociate_with_menu($id);
        return back();
    }
    
    public function create(Request $request)
    {
        $user_id = \Auth::user()->id;
    	$favorite_ingredients = \Auth::user()->get_favorite_ingredient()->pluck('ingredient_id');
    	$date = $request->date; //フォームに入力された日付を取得
    	$replace = [
            // '置換前の文字' => '置換後の文字',
            '年' => '-',
            '月' => '-',
            '日' => '-',
        ];
        $date = strtr($date, $replace);
        $recipes = Recipe::all();
        foreach($recipes as $recipe){
    	$recomended_recipes = $recipe->belongsToMany(Ingredient::class,'ingredients_for_cookings','recipe_id','ingredient_id')->wherePivot('ingredient_id',$favorite_ingredients)->pluck('recipe_id')->toArray();
    	$recomended_recipes_id[] = $recomended_recipes;
    	//dd($recomended_recipes_id);
        }
        $recomended_recipes_id = array_collapse($recomended_recipes_id);
        $recomended_recipes_id = array_unique($recomended_recipes_id);
        $cnt = count($recomended_recipes_id);
        if($cnt<=5){
            $random_int = mt_rand(2,$cnt);//最小2、最大5
        }else{
            $random_int = mt_rand(2,5);//最小2、最大5
        }
        
        $keys = array_rand($recomended_recipes_id,$random_int);
        
        //dd($recomended_recipes_id);
        
    	foreach($keys as $key){
    	    $menu = new Menu;
    	    $menu->user_id = $user_id;
    	    $menu->recipe_id = $recomended_recipes_id[$key];
    	    $menu->YYYYMMDD = $date;
    	    $menu->save();
    	}
	    return back();
	    dump('saved');
    }
    
}
