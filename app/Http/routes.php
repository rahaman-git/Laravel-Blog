<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('about', ['middleware' => 'auth', 'uses' => 'PagesController@about']);

Route::get('about', ['middleware' => 'auth', function(){
    return 'This page will only show if the user is signed in';
}]);

//Route::get('about', 'ArticlesController@about');
//Route::get('articles', 'ArticlesController@index');
//error //Route::get('articles/create', ['middleware' => 'demo', 'uses' => 'ArticlesController@create']);
//Route::post('articles', 'ArticlesController@store');
//Route::get('articles/{id}', 'ArticlesController@show');

Route::resource('articles', 'ArticlesController');

Route::get('tags/{tags}', 'TagsController@show');

Route::controllers([
   'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('foo', ['middleware' => 'manager', function(){
    return 'This page is only for manager';
}]);