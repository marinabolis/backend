<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::middleware('sanctum:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('register','App\Http\Controllers\UserController@register');
Route::post('login','App\Http\Controllers\UserController@login');

// Route::middleware(['auth','isAdmin'])->group(function(){
//     Route::get('user','App\Http\Controllers\UserController@index');

//  });


Route::get('drugs','App\Http\Controllers\DrugController@getDrug');



