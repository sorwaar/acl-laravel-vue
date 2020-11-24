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
    return view('welcome');
});

Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'User\DashboardController@index')->name('dashboard');
    Route::get('logout', 'User\DashboardController@logout')->name('logout');

    Route::group(['prefix' => 'role'], function () {
        Route::get('/', 'User\RoleController@create')->name('role.create');
        Route::get('get', 'User\RoleController@index')->name('role.index');
        Route::post('store', 'User\RoleController@store')->name('role.store');
        Route::get('edit/{id}', 'User\RoleController@edit')->name('role.edit');
        Route::put('update/{id}', 'User\RoleController@update')->name('role.update');
        Route::get('delete/{id}', 'User\RoleController@destroy')->name('role.destroy');
    });

    Route::group(['prefix' => 'permission'], function () {
        Route::get('/', 'User\RolePermissionController@index')->name('permission.index');
        Route::post('/store', 'User\RolePermissionController@store')->name('permission.store');
        Route::post('/get_all_menu', 'User\RolePermissionController@getAllMenu')->name('permission.getAllMenu');
    });

    Route::group(['prefix' => 'user-registration'], function () {
        Route::get('/', 'User\UserController@create')->name('user-registration.create');
        Route::get('get', 'User\UserController@index')->name('user-registration.index');
        Route::post('store', 'User\UserController@store')->name('user-registration.store');
        Route::get('edit/{id}', 'User\UserController@edit')->name('user-registration.edit');
        Route::put('update/{id}', 'User\UserController@update')->name('user-registration.update');
        Route::get('delete/{id}', 'User\UserController@destroy')->name('user-registration.destroy');
    });

    Route::group(['prefix' => 'changePassword'], function () {
        Route::get('/', 'User\ChangePasswordController@index')->name('changePassword.index');
        Route::put('/update/{id}', 'User\ChangePasswordController@update')->name('changePassword.update');
    });

});
