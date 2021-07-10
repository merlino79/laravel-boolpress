<?php

use App\Post;
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
    'isValid' => true
  ];
   
   //return response()->json($data);
   return response()->json($data);
});


Route::namespace('Api')
        ->group(function(){
            Route::get('posts','PostController@index')->name('api.posts');
            Route::get('posts/{slug}', 'PostController@show')->name('show');
        });