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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Admin
Route::namespace('Admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::resource('group', 'GroupController');
    Route::resource('category', 'CategoryController');
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');
});

//USER
Route::namespace('Frontend')->middleware(['auth', 'isUser'])->group(function () {
    Route::get('/my-profile', 'UserController@myprofile')->name('my-profile');
    Route::post('/my-profile-update', 'UserController@profileupdate')->name('my-profile-update');
});
