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
    return "hello";
});





/*
background routes. background as bg
*/
Route::group(['prefix' => 'admin'], function (){
    // bg login page routes
    Route::get('login', 'Admin\PublicController@login')->name('login');
    // bg logout
    Route::get('logout', 'Admin\PublicController@logout');
    // bg login handle. {{ url('check') }} can visit
    Route::post('check', 'Admin\PublicController@check')->name('check');

    // bg index page routes
    Route::get('index/index', 'Admin\IndexController@index')->middleware('auth');
    Route::get('index/welcome', 'Admin\IndexController@welcome');

});