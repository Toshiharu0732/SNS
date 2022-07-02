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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();



//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');


Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


//ログイン中のページ

Route::group(['middleware' => 'auth'], function() {

Route::get('/top','PostsController@index');

//プロフィールのページ
Route::get('/profile','UsersController@profile');
//プロフィール更新
Route::post('/profile','UsersController@update');

//検索のページ
Route::get('/search','UsersController@search');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

Route::get('/logout', 'Auth\LoginController@logout');

});



// 投稿画面の表示
Route::get('/top', 'PostsController@index');
// 投稿処理
Route::post('posts', 'PostsController@store');
// 更新処理
Route::post('/update','PostsController@update');
// 投稿削除処理
Route::get('/top/{id}/delete', 'PostsController@delete');
