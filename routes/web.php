<?php
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
Route::any('/','MainController@home')->name('home');
Route::get('/category','MainController@category')->name('category');
Route::get('/nowlive','MainController@nowlive')->name('nowlive');
Route::get('/shopcart','MainController@shopcart')->name('shopcart');
Route::get('/search','MainController@search')->name('search');
Route::get('/privacy','MainController@privacy')->name('privacy');
Route::namespace('Auth')->group(function(){
    Route::get('/login','LoginController@login')->name('login');
    Route::post('/login','LoginController@email')->name('email');
    Route::any('/login/{openapi}','LoginController@socialite');
});
Route::middleware('guests')->group(function(){
    Route::get('/account','UserController@account')->name('account');
});



