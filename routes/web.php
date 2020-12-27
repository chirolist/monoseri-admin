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

Route::get('/', function () {
    return view('index');
});
Route::resource('bookmark', 'BookMarkController');
Route::resource('bookmark/import', 'BookMarkImportController')->only([ 'create', 'store' ]);
Route::resource('playhistory', 'PlayHistoryController');
Route::resource('product', 'ProductController');
Route::resource('product/import', 'ProductImportController')->only([ 'create', 'store' ]);
Route::get('product_csv/download', 'ProductCsvController@download');
Route::resource('customer', 'CustomerController');
Route::get('customer_csv/download', 'CustomerCsvController@download');
Route::resource('user', 'UserController');
Route::get('user_csv/download', 'UserCsvController@download');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
