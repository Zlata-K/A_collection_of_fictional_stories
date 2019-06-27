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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','PagesController@index');
Route::get('/stories', 'PagesController@stories');

Route::resource('stories', 'StoryController');
Route::resource('authors', 'UserController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('locale/{locale}', function($locale){
    Session::put('locale', $locale);
    return redirect()->back();
    //Will add session of language when users click to change language
});

Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');

//Route::resource('/comments','CommentController')->except('create','index');
Route::post('/comment/store', 'CommentController@store')->name('comment.add');