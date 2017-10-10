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
    
    return view('auth.login');
});


Route::resource('/article', 'articlesController');
Route::get('/articles', 'articlesController@index')->name('article.index');
Route::get('/article/transaction/{article}', 'TransactionController@create')->name('transaction.create');
Route::post('transaction/store', 'TransactionController@store')->name('transaction.store');

Route::POST('/article', 'articlesController@store')->name('article.store');
Route::get('/article/create', 'articlesController@create')->name('article.create');
Route::get('/article/{id}', 'articlesController@show')->name('article.show');
Route::PATCH('/article/{id}', 'articlesController@update')->name('article.update');
Route::get('/article/{id}/delete',['uses'=>'articlesController@delete','as'=>'article.delete']);
Route::delete('/article/{article}', 'articlesController@destroy')->name('article.destroy');
Route::get('article/{id}/edit',['uses'=>'articlesController@edit','as'=>'article.edit']);

Route::resource('categories', 'CategoriesController', ['except' => ['create']]);
Auth::routes();




Route::get('/article/category/{id}', 'articlesController@GetCat')->name('category');
Route::POST('/article/search', 'articlesController@search')->name('article.search');



Route::get('/article', 'articlesController@index')->name('article');

Route::get('/myarticles', 'articlesController@myarticles')->name('article.myarticles');




Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/user/{id}','UsersController@show')->name('user.profile');