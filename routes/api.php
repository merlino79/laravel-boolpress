<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//prova
Route::get('/test',function(){
  $data = [
    'nomi' => ['gino', 'pino'],
    'level' => 3,
  ];
  return response()->json($data);
});


// Route::namespace('Api')
//         ->group(function(){
//             route::get('posts','PostController@index')->name('api.posts');
//         });