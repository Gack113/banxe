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

// Front-End //

// Product
Route::get('/',[
    'as' => 'home',
    'uses' => 'PageController@index'
]);

Route::get('loai-xe/{name}',[
    'as' => 'loai',
    'uses' => 'PageController@ProductType'
]);

Route::get('/{slug}',[
    'as' => 'chi-tiet',
    'uses' => 'PageController@preLoadDetail'
]);

Route::get('thong-tin/lien-he',[
    'as' => 'lien-he',
    'uses' => 'PageController@Contact'
]);


// End product

// Cart
Route::get('gio-hang/them-vao-gio-hang/{id}',[
    'as' => 'them-vao-gio-hang',
    'uses' => 'PageController@AddCart'
]);

Route::get('reduce-cart/{id}',[
    'as' => 'reducecart',
    'uses' => 'PageController@ReduceCart'
]);

Route::get('reduce-cart-by-one/{id}',[
    'as' => 'reducecartbyone',
    'uses' => 'PageController@ReduceCartByOne'
]);

Route::get('dat-hang/xe',[
    'as' => 'dat-hang',
    'uses' => 'PageController@Order'
]);
// End cart

// Order
Route::post('order',[
    'as' => 'order',
    'uses' => 'PageController@Checkout'
]);

// Search
Route::get('xe/tim-kiem',[
    'as'=>'tim-kiem',
    'uses'=>'PageController@Search'
]);

// End Front-End //

// Back-End //
Route::get('admin/index',[
    'as'=>'admin',
    'uses'=> 'AdminController@index'
]);

//product
Route::get('admin/list-product',[
    'as'=>'list-product',
    'uses'=> 'AdminController@list_product'
]);

Route::get('admin/add-product',[
    'as'=>'add-product',
    'uses'=> 'AdminController@add_product'
]);

Route::post('admin/add-product',[
    'as'=>'add-product',
    'uses'=> 'AdminController@add_product_submit'
]);

Route::get('admin/show-product/{id}',[
    'as'=>'show-product',
    'uses'=>'AdminController@show_product'
]);

Route::get('admin/update-product/{id}',[
    'as'=>'update-product',
    'uses'=>'AdminController@update_product'
]);

Route::post('admin/update-product/{id}',[
    'as'=>'update-product',
    'uses'=>'AdminController@update_product_submit'
]);

Route::get('admin/delete-product/{id}',[
    'as'=>'delete-product',
    'uses'=>'AdminController@delete_product'
]);

// End product

// User
Route::get('user/login',[
    'as' => 'login',
    'uses' => 'AdUserController@login'
]);

Route::post('user/login',[
    'as' => 'login',
    'uses' => 'AdUserController@login_submit'
]);

Route::get('user/signup',[
    'as' => 'signup',
    'uses' => 'AdUserController@signup'
]);

Route::post('user/signup',[
    'as' => 'signup',
    'uses' => 'AdUserController@signup_submit'
]);

Route::get('user/logout',[
    'as' => 'logout',
    'uses' => 'AdUserController@logout'
]);

Route::get('admin/add-user',[
    'as'=>'add-user',
    'uses'=>'AdUserController@add'
]);

Route::post('admin/add-user',[
    'as'=>'add-user',
    'uses'=>'AdUserController@add_submit'
]);

Route::get('admin/users',[
    'as'=>'list-user',
    'uses'=>'AdUserController@index'
]);

Route::get('admin/profile',[
    'as'=>'profile',
    'uses'=>'AdUserController@profile'
]);

Route::get('admin/update-user/{id}',[
    'as'=>'update-user',
    'uses'=>'AdUserController@update'
]);

Route::post('admin/update-user/{id}',[
    'as'=>'update-user',
    'uses'=>'AdUserController@update_submit'
]);

Route::get('admin/delete-user/{id}',[
    'as'=>'delete-user',
    'uses'=>'AdUserController@delete'
]);

// End user

// Customer
Route::get('admin/customers',[
    'as'=>'list-customer',
    'uses'=>'CustomerController@index'
]);

Route::get('admin/delete-customer/{id}',[
    'as'=>'delete-customer',
    'uses'=>'CustomerController@delete'
]);

// Bill
Route::get('admin/bills',[
    'as'=>'list-bill',
    'uses'=>'BillController@index'
]);

Route::get('admin/show-bill/{id}',[
    'as'=>'show-bill',
    'uses'=>'BillController@show'
]);

Route::get('admin/delete-bill/{id}',[
    'as'=>'delete-bill',
    'uses'=>'BillController@delete'
]);

Route::post('admin/update-bill/{id}',[
    'as'=>'update-bill',
    'uses'=>'BillController@update'
]);

