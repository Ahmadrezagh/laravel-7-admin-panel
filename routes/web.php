<?php

use Illuminate\Support\Facades\Route;

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


//Auth Router Admin
Route::get('administrator/login', 'Admin\AuthController@showLoginForm')->name('admin.login');
Route::post('administrator/login', 'Admin\AuthController@login')->name('admin.login.submit');
Route::post('administrator/logout', 'Admin\AuthController@logout')->name('admin.logout');

Route::prefix('administrator')->middleware(['auth:admin'])->group(function () {


    //Router For Add Admin
    Route::get('/', 'Admin\HomeController@index')->name('admin.dashboard');
    Route::get('/admin/index', 'Admin\AdminController@index')->name('admin.index');
    Route::get('/admin/create', 'Admin\AdminController@createAdmin')->name('admin.create');
    Route::post('/admin/store', 'Admin\AdminController@storeAdmin')->name('admin.store');
    Route::get('/admin/edit/{admin}', 'Admin\AdminController@editAdmin')->name('admin.edit');
    Route::post('/admin/update/{admin}', 'Admin\AdminController@updateAdmin')->name('admin.update');

    //Router For Category
    Route::get('/category/index' , 'Admin\CategoryController@index')->name('category.index');
    Route::get('/category/create' , 'Admin\CategoryController@create')->name('category.create');
    Route::post('/category/store' , 'Admin\CategoryController@store')->name('category.store');
    Route::get('/category/edit/{category}' , 'Admin\CategoryController@edit')->name('category.edit');
    Route::post('/category/update/{category}' , 'Admin\CategoryController@update')->name('category.update');

    //Router For Role
    Route::get('/role/create', 'Admin\AdminController@createRole')->name('role.create');
    Route::post('/role/store', 'Admin\AdminController@storeRole')->name('role.store');
    Route::get('/role/edit/{role}', 'Admin\AdminController@editRole')->name('role.edit');
    Route::post('/role/update/{role}', 'Admin\AdminController@updateRole')->name('role.update');
    Route::post('/role/post/delete', 'Admin\AdminController@deleteRole')->name('role.delete');

    Route::get('/settings/{setting_name}','Admin\SettingController@index')->name('setting.index');
    Route::post('/settings/update','Admin\SettingController@update')->name('settings.update');
});