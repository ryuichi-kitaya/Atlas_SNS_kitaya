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

Route::get('/',function(){
    return view('index');
})->name('login');

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => 'auth'],function(){
Route::get('/top','PostsController@index');
Route::post('/top','PostsController@tweet');//ツイート登録用
Route::post('/post/update','PostsController@update');//つぶやき更新用
Route::get('/post/{id}/delete','PostsController@delete');//つぶやき削除用

Route::get('/profile/{id}/edit','UsersController@profile');
Route::post('/profile/{id}/edit','UsersController@edit');//プロフィール編集画面遷移

Route::post('/search','UsersController@search')->name('users.search');
Route::get('/search','UsersController@searchView');

Route::post('/follow/{user}','FollowsController@follow')->name('follow');//フォローする
Route::post('/unfollow/{user}','FollowsController@unfollow')->name('unfollow');//フォロー解除

Route::get('/follow-list','FollowsController@followlist');
Route::get('/follower-list','FollowsController@followerlist');

Route::get('/otherprofile/{id}','FollowsController@otherprofile');

Route::get('/logout','Auth\LoginController@logout');
});
