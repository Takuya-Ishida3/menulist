<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $ingredients = App\Ingredient::all();
    $meats = App\Ingredient::where('categories' , '肉')->get();
    return view('welcome' , [
            'ingredients' => $ingredients,
            'meats' => $meats,
        ]);
});

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//レシピを検索・表示


Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['show', 'edit']]);
    Route::resource('recipes', 'RecipesController', ['only' => ['create','edit','update','destroy']]);
    Route::post('recipes/create', 'RecipesController@store')->name('recipes.store');
    
    Route::group(['prefix' => 'users/{id}'], function() {
        Route::post('favorite', 'FavorRecipesController@store')->name('favor.recipe');
        Route::delete('unfavorrite', 'FavorRecipesController@destroy')->name('unfavor.recipe');
    });
    
});

Route::match(['get','post'],'recipes', 'RecipesController@index')->name('recipes');
Route::get('recipes/{id}', 'RecipesController@show')->name('recipes.show');