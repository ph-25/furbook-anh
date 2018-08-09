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
use Furbook\Breed;
Route::get('/', function () {
    return redirect('/cats');
    
});

//list cats
Route::get('/cats',function(){
	$cats =Furbook\Cat::all();
	// dd($cats);

	#Assign variable to view

//c1 use array
//return view('cats/index',array('cats'=>$cats));

//c2 use compact function
//return view('cats/index', compact('cats'));

//c3 use with function
return view('cats/index')->with('cats',$cats);
});
//hiển thị chi tiết một con mèo thông qua id
Route::get('/cats/{id}', function($id) {
	return sprintf('Cat #%s', $id);
})->where('id','[0-9]+');

//display all cat belong to breed name
Route::get('/cats/breeds/{name}', function($name) {
	$breed = Breed::with('cats')
	->where('name',$name)
	->first();
	return view('cats.index')
	->with('breed', $breed)
	->with('cats', $breed->cats);
});

//create new cat
Route::get('/cats/create',function(){
	return view('cats.create');
});

//insert new cat
Route::post('/cats',function(){
	dd(Request::all());
	$data = Request::all();
	$cat = Furbook\Cat::create($data);
	return redirect('/cats/'. $cat->id)
	 ->withSuccess('Create cat success');
});

//show page edit a cat

Route::get('/cats/{id}/edit', function($id){
	$cat = Furbook\Cat::find($id);
	return view ('cats.edit')->with('cat', $cat);
});



//update a cat
Route::put('/cats/{id}', function($id){
	$data = Request::all();
	$cat = Furbook\Cat::find($id);
	$cat->update($data);
	return redirect('/cats/'.$cat->id)
	->withSuccess('Create cat success');
});

//delete a cat
Route::get('/cats/{cat}/delete',function(Furbook\Cat $cat){
	$cat->delete();
	return redirect('cats')
	->withSuccess('Cat has been deleted');
});