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
Route::get('/koleksi', 'Frontend\CollectionController@index')->name('collection.index');
Route::get('/koleksi/{group_slug}', 'Frontend\CollectionController@groupview')->name('collection.groupview');
Route::get('/koleksi/{group_slug}/{category_slug}', 'Frontend\CollectionController@categoryview')->name('collection.categoryview');
Route::get('/koleksi/{group_slug}/{category_slug}/{subcategory_slug}', 'Frontend\CollectionController@subcategoryview')->name('collection.subcategoryview');

//Admin
Route::namespace('Admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::resource('group', 'GroupController');
    Route::resource('category', 'CategoryController');
    Route::resource('subcategory', 'SubCategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');
});

//USER
Route::namespace('Frontend')->middleware(['auth', 'isUser'])->group(function () {
    Route::get('/my-profile', 'UserController@myprofile')->name('my-profile');
    Route::post('/my-profile-update', 'UserController@profileupdate')->name('my-profile-update');
});
