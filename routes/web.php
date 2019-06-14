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
    Route::resource('users', 'UsersController', ['only' => ['show', 'edit',]]);
    Route::match(['get','post'],'users/{id}/edit/update', 'UsersController@update')->name('users.update');
    Route::resource('recipes', 'RecipesController', ['only' => ['create','edit','update','destroy']]);
    Route::post('recipes/create', 'RecipesController@store')->name('recipes.store');

    Route::group(['prefix' => 'users/{id}'], function() {
        Route::post('favor_recipe', 'FavorRecipesController@store')->name('favor.recipe');
        Route::delete('unfavor_recipe', 'FavorRecipesController@destroy')->name('unfavor.recipe');
        Route::post('favor_ingredient', 'FavorIngredientsController@store')->name('favor.ingredient');
        Route::delete('unfavor_ingredient', 'FavorIngredientsController@destroy')->name('unfavor.ingredient');
        Route::post('associate_with_menu', 'MenusController@store')->name('associate_with_menu');
        Route::delete('unassociate_with_menu', 'MenusController@destroy')->name('unassociate_with_menu');
    });
    
});

Route::match(['get','post'],'recipes', 'RecipesController@index')->name('recipes');
Route::get('recipes/{id}', 'RecipesController@show')->name('recipes.show');

/** これ不要
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'recipes/{id}'], function() {
            Route::post('menu.post', 'MenusController@store')->name('menu.post');
    });
});
**/

Route::get('menus','MenusController@index')->name('menus.index');