<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/index', function(){
	return view('index');
});


Route::get('/','moviesController@home');

Route::get('/index','moviesController@index');

Route::get('/mostrarPeliculas','moviesController@mPeliculas');


/*
Route::get('/','pokemonController@home');

Route::get('/home','pokemonController@home');

Route::get('/mostrarPokemons/{id}','pokemonController@mostrarPokemons');

Route::get('/darPoder/{id}','pokemonController@darPoder');

*/


