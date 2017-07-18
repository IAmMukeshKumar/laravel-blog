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


//Routing for public users'
Route::get('/', 'PostPublicController@index')->name('publicpost.index');
Route::get('show/{id}/{slug?}', 'PostPublicController@show')->name('publicpost.show')->where(['id' => '[0-9]+']);;


//  Auth routing
Auth::routes();


//Group resource controllers of categories and posts. Apply 'auth' middleware to them
Route::middleware('auth')->group(function () {
    Route::resource('post', 'PostAdminController');

        Route::resource('category', 'CategoryController', [
            'except' => 'show'
        ]);


    Route::get('approve/{comment}','ApproveCommentController@approve')->name('comment.approve');
    Route::get('delete/{comment}','ApproveCommentController@delete')->name('comment.delete');
    Route::get('Post/{post}','ApprovePostController@approve')->name('post.approve');

});

// Comments route
Route::post('post/{post}/comment', 'CommentController@store')->name('comment.store');


