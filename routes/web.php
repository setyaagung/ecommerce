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

//Frontend
Route::get('/', 'HomeController@index')->name('home');
Route::get('/kategori', 'Frontend\CollectionController@index')->name('collection.index');
Route::get('/kategori/{group_slug}', 'Frontend\CollectionController@groupview')->name('collection.groupview');
Route::get('/kategori/{group_slug}/{category_slug}', 'Frontend\CollectionController@categoryview')->name('collection.categoryview');
Route::get('/kategori/{group_slug}/{category_slug}/{subcategory_slug}', 'Frontend\CollectionController@subcategoryview')->name('collection.subcategoryview');
Route::get('/kategori/{group_slug}/{category_slug}/{subcategory_slug}/{product_slug}', 'Frontend\CollectionController@productview')->name('collection.productview');

//Cart
Route::get('/keranjang', 'Frontend\CartController@index')->name('cart.index');
Route::post('/add-to-cart', 'Frontend\CartController@addtocart')->name('cart.addtocart');
Route::get('/load-cart-data', 'Frontend\CartController@cartloadbyajax')->name('cart.loadbyajax');
Route::post('/update-to-cart', 'Frontend\CartController@updatetocart')->name('cart.updatetocart');
Route::delete('/delete-from-cart', 'Frontend\CartController@deletefromcart')->name('cart.deletefromcart');
Route::get('/clear-cart', 'Frontend\CartController@clearcart')->name('cart.clearcart');


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
    //checkout
    Route::get('/checkout', 'CheckoutController@index')->name('checkout');
});
