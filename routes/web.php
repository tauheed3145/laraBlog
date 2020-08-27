<?php

use GuzzleHttp\Middleware;
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


Route::get('/', 'Website\HomeController@index');

Auth::routes();





Route::group(['middleware'=>['auth']], function () {
    
    Route::get('/home','Admin\DashboardController@index')->name('home');
    Route::resource('category', 'Admin\CategoryController');


});




