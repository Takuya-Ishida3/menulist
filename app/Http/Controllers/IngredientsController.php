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
        $user = \Auth::user();
        $ingredients = Ingredient::all();
        $ingredient_ids = $ingredients->pluck('id');
        //dd($ingredient_ids);
        $monday = new Carbon('monday this week');
        $sunday = new Carbon('sunday this week');
        $recipes_ids = $user->get_menu()->whereBetween('YYYYMMDD',[$monday, $sunday])->pluck('recipes.id');
        //dd($recipes_ids);
        foreach($recipes_ids as $recipes_id)
        {
            $recipe = Recipe::find($recipes_id);
            //dd($recipe);
            $required_amounts[] = $recipe->belongsToMany(Ingredient::class,'ingredients_for_cookings','recipe_id','ingredient_id')->withPivot('required_amount')->pluck('required_amount','ingredient_id')->toArray();//ここでrequired_amountだけじゃなくingredient_idもとれないか？
            //dd($required_amounts);
        }
        //dump($required_amounts);
        //dd($required_amounts);
        
        foreach($ingredient_ids as $ingredient_id)
        {
            $sum[$ingredient_id] = array_sum(array_column($required_amounts,$ingredient_id));
        }
        //dump($sum);
        
        
        /**
        foreach ($ingredient_ids as $ingredient_id)
        {
            
        }
        //->where('ingredient_id',$ingredient_id)
        **/
        
        $data = [
            'user' => $user,
            'ingredients' => $ingredients,
            'sum' => $sum
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
