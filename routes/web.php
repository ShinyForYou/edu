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
Background routes. background as bg
*/
//Route::group(['prefix' => 'admin'], function (){
//    // bg login page routes
//    Route::get('login', 'Admin\PublicController@login')->name('login');
//    // bg logout
//    Route::get('logout', 'Admin\PublicController@logout');
//
//});
//
//Route::group(['prefix' => 'admin'], function (){
//    // bg login handle. {{ url('check') }} can visit
//    Route::post('check', 'Admin\PublicController@check')->name('check');
//
//    // bg index page routes
//    Route::get('index/index', 'Admin\IndexController@index');
//    Route::get('index/welcome', 'Admin\IndexController@welcome');
//});

Route::prefix('admin')->group(function () {
    // bg login page routes
    Route::get('login', 'Admin\PublicController@login')->name('login');
    // bg logout
    Route::get('logout', 'Admin\PublicController@logout');
});
// ->middleware('auth:admin') 老是有问题呢 认证成功还返回登录页面，关键是有时能登进去，有时不能，还不报错？等会解决
// ->middleware('checkrbac')
Route::prefix('admin')->group(function () {
    // bg login handle. {{ url('check') }} can visit
    Route::post('check', 'Admin\PublicController@check');

    // bg index page routes
    Route::get('index/index', 'Admin\IndexController@index');
    Route::get('index/welcome', 'Admin\IndexController@welcome');

    Route::get('manager/welcome', 'Admin\ManagerController@index');
    // RBAC verify
    Route::any('auth/add', 'Admin\AuthController@add');
    Route::get('auth/index', 'Admin\AuthController@index');

    // role manager
    Route::get('role/index', 'Admin\RoleController@index');
    Route::get('role/assign', 'Admin\RoleController@assign');
    Route::any('role/add', 'Admin\RoleController@add');

    // Member manage route
    Route::get('member/index', 'Admin\MemberController@index');
    Route::any('member/add', 'Admin\MemberController@add');
    Route::get('member/getAreaById', 'Admin\MemberController@getAreaById');
    Route::get('uploader/webUploader', 'Admin\UploadController@webUpload');


});
