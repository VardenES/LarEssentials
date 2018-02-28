<?php

Route::get('/', function()
{
	return redirect('cats');
});

Route::get('cats', function()
{
	$cats = Furbook\Cat::all();

	return view('cats.index')->with('cats', $cats);
});

Route::get('cats/breeds/{name}', function($name)
{
	$breed = Furbook\Breed::whereName($name)->firstOrFail();
	$id = $breed[0]['attributes']['id'];
	//$cats = Furbook\Cat::whereBreed_Id($id)->get();
	//$cats = Furbook\Cat::whereBreed_Id($id)->get();
	//$cats = Furbook\Cat::firstOrFail();



//$cats = Furbook\Breed::whereName($name)->first()->cats;
$cats = Furbook\Breed::get();
	var_dump($cats);
/*
	$breeds = Furbook\Breed::with('cats')
		->whereName($name)
		->get();


	$cats = Furbook \Breed::whereName($name)->first()->cats;
*/

	return view('cats.index')
		->with('breed', $breed)
		->with('cats', $cats);
});

Route::get('cats/create', function()
{
	return view('cats.create');
});

Route::get('cats/{cat}', function(Furbook\Cat $cat)
{
	return view('cats.show')->with('cat', $cat);

})->where('id', '[0-9]+');

Route::post('cats', function()
{
	$cat = Furbook\Cat::create(Input::all());

	return redirect('cats/'.$cat->id)
		->withSuccess('Cat has been created.');
});

Route::get('cats/{cat}/edit', function(Furbook\Cat $cat)
{
	return view('cats.edit')->with('cat', $cat);
});

Route::delete('cats/{cat}/delete', function(Furbook\Cat $cat) {
	$cat->delete();
	return redirect('cats')->withSuccess('This cat has been eliminated.');
});

Route::put('cats/{cat}', function(Furbook\Cat $cat)
{
	$cat->update(Input::all());

	return redirect('cats/'.$cat->id)
		->withSuccess('Cat has been updated.');
});

Route::delete('cats/{cat}', function(Furbook\Cat $cat)
{
	$cat->delete();

	return redirect('cats')
		->withSuccess('Cat has been deleted.');
});

Route::get('about', function()
{
	return view('about')->with('number_of_cats', 9000);
});

// Route::resource('cat', 'CatController');
