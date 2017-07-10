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
//


Route::get('/','PostPublicController@index')->name('publicpost.index');
Route::get('show/{id}','PostPublicController@show')->name('publicpost.show');

Auth::routes();

Route::middleware('auth')->group(function()
{
    Route::resource('post', 'PostAdminController');

    Route::resource('category', 'CategoryController', [
        'except' => 'show'
    ]);
});

//Route::get('/home', 'HomeController@index')->name('home');


