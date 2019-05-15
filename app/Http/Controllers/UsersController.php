<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

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
        
        return view('users.edit',[
                'user' => $user,
            ]);
    }
}
