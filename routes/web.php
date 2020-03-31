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
    return redirect('login');
});

Auth::routes();

Route::group(['middleware' => ['auth','menu']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    // USER
    Route::namespace('User')->group(function () {

        Route::get('users/all/source','UserController@source');
        Route::resource('users/all','UserController');

        Route::get('users/role/source','RoleController@source');
        Route::resource('users/role','RoleController');

        Route::get('users/permission/source','PermissionController@source');
        Route::resource('users/permission','PermissionController');

    });

});
