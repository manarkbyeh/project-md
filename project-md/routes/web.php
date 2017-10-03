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
    return view('welcome');
});
Route::resource('/article', 'articlesController');
Route::POST('/article', 'articlesController@store')->name('article.store');
Route::get('/article/create', 'articlesController@create')->name('article.create');
Route::get('/article/{id}', 'articlesController@show')->name('article.show');
Route::PATCH('/article/{id}', 'articlesController@update')->name('article.update');
Route::get('/article/{id}/delete',['uses'=>'articlesController@delete','as'=>'article.delete']);
Route::delete('/article/{article}', 'articlesController@destroy')->name('article.destroy');
Route::get('article/{id}/edit',['uses'=>'articlesController@edit','as'=>'article.edit']);
Route::get('/article/search/{id}', 'articlesController@search')->name('article.search');
Route::get('/article/{id}/active', 'articlesController@active')->name('article.active');
Route::resource('categories', 'CategoriesController', ['except' => ['create']]);
Auth::routes();



Route::group(['middleware' => 'auth'], function () {
    //rolees
    Route::get('/roles', 'RolesController@index');
    Route::get('roles/search/{search}',['uses'=>'RolesController@search','as'=>'roles.search']);
    
});