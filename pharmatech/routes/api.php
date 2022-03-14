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

// **************************** table orders ***************************************
Route::get('orders','App\Http\Controllers\OrderController@getOrder');

Route::get('orders/{id}','App\Http\Controllers\OrderController@getOrderById');

Route::post('addOrder','App\Http\Controllers\OrderController@addOrder');

Route::put('updateOrder/{id}','App\Http\Controllers\OrderController@updateOrder');
Route::delete('deleteOrder/{id}','App\Http\Controllers\OrderController@deleteOrder');

// **************************** table users ***************************************
Route::get('users','App\Http\Controllers\UserController@getUser');

Route::get('users/{id}','App\Http\Controllers\UserController@getUserById');

Route::post('addUser','App\Http\Controllers\UserController@addUser');

Route::put('updateUser/{id}','App\Http\Controllers\UserController@updateUser');
Route::delete('deleteUser/{id}','App\Http\Controllers\UserController@deleteUser');

// **************************** table categories  ***************************************
Route::get('categories','App\Http\Controllers\CategoryController@getCategory');

Route::get('categories/{id}','App\Http\Controllers\CategoryController@getCategoryById');

Route::post('addCategory','App\Http\Controllers\CategoryController@addCategory');

Route::put('updateCategory/{id}','App\Http\Controllers\CategoryController@updateCategory');
Route::delete('deleteCategory/{id}','App\Http\Controllers\CategoryController@deleteCategory');


// **************************** tables UserDrug ******************************************************************

Route::post('storeUserDrug','App\Http\Controllers\UserDrugController@store');
Route::get('userdrug/{id}','App\Http\Controllers\UserDrugController@show');
Route::put('updateUserDrug/{id}','App\Http\Controllers\UserDrugController@updateUserDrug');
Route::delete('deleteUserDrug/{id}','App\Http\Controllers\UserDrugController@deleteDrug');