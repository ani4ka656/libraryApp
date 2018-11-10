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

//Route::get('/home', function () {
  //  return view('welcome');
//});
//Route::resource('authors', 'AuthorsController',);
//Route::resource('books', 'BooksController');
//Route::resource('mybooks', 'MyBooksController');

Auth::routes();

Route::group( ['middleware' => 'auth'] ,function(){ 

	Route::resource('authors', 'AuthorsController', ['only'=> ['index', 'show']]);
	Route::resource('authors', 'AuthorsController', ['only' => ['store', 'create', 'edit', 'update', 'destroy']])->middleware('isAdmin');
	Route::resource('books', 'BooksController', ['only'=> ['index', 'show','download']]);
	Route::resource('books', 'BooksController', ['only' => ['store', 'create', 'edit', 'update', 'destroy']])->middleware('isAdmin');
	Route::resource('mybooks', 'MyBooksController', ['only'=> ['index', 'show']])->middleware('isAdmin');
	Route::resource('mybooks', 'MyBooksController', ['only' => ['store', 'create', 'edit', 'update', 'destroy']]);
	Route::get('/books/download/{id}', 'BooksController@download')->name('downloadbooks');
	//Route::get('/home', function () {
  	  //return view('welcome');
	//});
	});


	

	// Route::resource('authors', 'AuthorsController', ['only'=> ['index']]);
	// Route::resource('books', 'BooksController', ['only'=> ['index']]);
	// Route::resource('mybooks', 'MyBooksController', ['only' => ['index']]);
	// Route::get('/books/download/{id}', 'BooksController@download')->name('downloadbooks');

	
	