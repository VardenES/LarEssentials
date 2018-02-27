<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    
    Route::get('/', function () {
	    return 'all cats';
	    //return redirect()->route('sobre'); //redirecionamento prar rotas nomeadas
	});

	Route::get('cats/{id}', function($id) {
	    
		return sprintf('Cat #%s', $id);

	})->where('id', '[0-9]+');

	Route::get('cats', ['as' => 'gatos', function() {
	    $cats = Furbook\Cat::all();
	    return view('cats.index')->with('cats', $cats);
	}]);

	Route::get('cats/breeds/{name}', function($name){
		//
	});

	Route::get('about', [ 'as' => 'sobre', function(){
		return view('about')->with('number_of_cats', 9009);
	}]);
	
});
