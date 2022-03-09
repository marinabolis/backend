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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
     });


// Route::post('register','App\Http\Controllers\UserController@register');
// Route::post('login','App\Http\Controllers\UserController@login');



Route::post('/register' , [UserController::class , 'register']);
Route::post('/login' , [UserController::class , 'login']);
// Route::middleware(['auth','isAdmin'])->group(function(){
//     Route::get('user','App\Http\Controllers\UserController@index');

//  });



// **************************** table drugs ***************************************
Route::get('drugs','App\Http\Controllers\DrugController@getDrug');

Route::get('drug/{id}','App\Http\Controllers\DrugController@getDrugById');

Route::post('addDrug','App\Http\Controllers\DrugController@addDrug');

Route::put('updateDrug/{id}','App\Http\Controllers\DrugController@updateDrug');
Route::delete('deleteDrug/{id}','App\Http\Controllers\DrugController@deleteDrug');