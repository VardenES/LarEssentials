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
    //return view('welcome');
    return 'All cats';

    // If we wanted users to be redirected to /cats when they visit the application for the first time
    // return redirect('cats');
});

Route::get('cats', function() {
	//return 'All cats';
	$cats = Furbook\Cat::all();
	return view('cats.index')->with('cats', $cats);
});

/*Route::get('cats/{id}', function($id) {
	return sprintf('Cat #%s', $id);
})->where('id', '[0-9]+');*/
Route::get('cats/{id}', function($id){
	$cat = Furbook\Cat::find($id);
	return view('cats.show')->with('cat', $cat);
});

Route::get('about', function() {
	return view('about')->with('number_of_cats', 9000);
});

Route::get('cats/breeds/{name}', function($name) {
	$breed = Furbook\Breed::with('cats')
		->whereName($name)
		->first();
	return view('cats.index')
		->with('breed', $breed)
		->with('cats', $breed->cats);
});

Route::get('cats/create', function() {
	return view('cats.create');
});

Route::post('cats', function() {
	$cat = LarEssentials\Cat::create(Input::all());
	return redirect('cats/'.$cat->id)
		->withSuccess('Cat has been created.');
});

Route::get('cats/{cat}/edit', function(LarEssentials\Cat $cat) {
	return view('cats.edit')->with('cat', $cat);
});

Route::put('cats/{cat}', function(LarEssentials\Cat $cat) {
	$cat->update(Input::all());
	return redirect('cats/'.$cat->id)
		->withSuccess('Cat has been updated.');
});

Route::delete('cats/{cat}', function(LarEssentials\Cat $cat) {
	$cat->delete();
	return redirect('cats')
		->withSuccess('Cat has been deleted.');
});
// Laravel 5 Essentials page 43. - Preparing the database