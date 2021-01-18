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

Route::get('/', 'HomeController@index')->name('guestPosts');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::post('/admin/storeposts', 'AdminController@storeProduct')->name('storeProduct');

Route::get('/admin/allproducts', "AdminController@allproducts")->name('allproducts');

Route::Post('/admin/delete', "AdminController@deleteProduct")->name('delete');

Route::get('/admin/edit/{id}', "AdminController@editProduct")->name('edit');

Route::post('/admin/edit/store', "AdminController@editStoreProduct")->name('editStoreProduct');

Route::get('/admin/addcategory', "AdminController@addcategory")->name('addcategory');

Route::post('/admin/storecategory', "AdminController@storecategory")->name('storecategory');

Route::get('/product/view/{id}', "HomeController@seeproduct")->name('seeproduct');

Route::post('/storeLike', "HomeController@addlike")->name('addlike');

Route::post('/storeComment', "HomeController@addComment")->name('addcomment');

