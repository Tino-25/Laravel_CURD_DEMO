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

Route::get('/contact', function(){
    return view('pages.contact');
});

//home
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

//product
Route::get('/all-product', 'ProductController@index');  //show all
Route::get('/add-product', 'ProductController@add_product');  // giao diện add 
Route::post('/save-product', 'ProductController@save_product');  // thực hiện add
Route::get('/edit-product/{IDproduct}', 'ProductController@edit_product'); //giao diện sửa
Route::post('/update-product/{IDproduct}', 'ProductController@update_product'); // thực hiện update
// xóa sản phẩm
Route::get('/delete-product/{IDproduct}', 'ProductController@delete_product');
//chi tiết
Route::get('/product-details/{IDproduct}', 'ProductController@details_product');