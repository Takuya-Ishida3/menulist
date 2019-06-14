<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Ingredient;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $favorite_recipes = $user->get_favorite_recipes()->paginate(5);
        
        $data = [
            'user' => $user,
            'favorite_recipes' => $favorite_recipes
        ];
        
        return view('users.show',$data);
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        $ingredients = Ingredient::all();
        
        $data= [
                'user' => $user,
                'ingredients' => $ingredients
            ];
        
        return view('users.edit',$data);
    }
    
    public function update(Request $request, $id)
    {
        $family_size = $request->family_size;
        $user = User::find($id);
        $user->family_size = $family_size;
        $user->save();
        
        return back();
    }
}
