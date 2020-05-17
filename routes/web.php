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

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

//ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('userlogin');
Route::post('login', 'Auth\LoginController@login')->name('userlogin.post');
Route::get('logout', 'Auth\LoginController@logout')->name('userlogout.get');   

Route::group(['middleware' => 'auth:user'], function() {
    Route::get('home', 'UsersController@index')->name('user.home');
    Route::get('eventdetail/{id}/','UsersController@show')->name('userevents.show');
    Route::get('userscheduled/','UsersController@userschedule')->name('user.scheduled');

    //イベント申込機能（中間テーブル操作）
    Route::group(['prefix'=>'eventdetail/{id}'],function(){
        Route::post('schedule','UsersController@store')->name('userschedule');
        Route::delete('cancel', 'UsersController@destroy')->name('usercancel');
    });
});


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
//管理者ログイン
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function () { return redirect('/admin/home'); });
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login','Admin\LoginController@login')->name('login.post');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('logout','Admin\LoginController@logout')->name('admin.logout');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
    
    //管理者機能追加
    Route::get('evenstlist','EventsController@index')->name('events.list');
    //イベント情報作成・変更
    Route::get('events','EventsController@create')->name('events.create');
    Route::post('events','EventsController@store')->name('events.store');
    Route::get('eventdetail/{id}/','EventsController@show')->name('events.show');
    Route::get('eventdetail/{id}/edit','EventsController@edit')->name('events.edit');
    Route::put('eventdetail/{id}/','EventsController@update')->name('events.update');
    Route::delete('eventdetail/{id}/','EventsController@destroy')->name('events.destroy');
    //イベント応募状況の確認
    Route::get('event_user_scheduled/{id}/','EventsController@scheduledlist')->name('event.user.scheduled');
    
});