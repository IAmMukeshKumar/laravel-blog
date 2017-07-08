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

    $posts = App\Post::where('id','>=',1)->where('status','=',0)->paginate(4);
    return view('posts.public',compact('posts'));
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('post', 'PostController');
