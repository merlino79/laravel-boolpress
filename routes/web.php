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


//Route::get('/', 'PageController@index');

Auth::routes(['register=>false']);
// Auth::routes();


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function(){
        route::get('/','HomeController@index')->name('home');
         Route::resource('/posts', 'PostController');
    });

Route::get('{any?}', 'PageController@index')->where('any', '.*');