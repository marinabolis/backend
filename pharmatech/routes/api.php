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

Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
     });



Route::post('/register' , [UserController::class , 'register']);
Route::post('/login' , [UserController::class , 'login']);

// **************************** table drugs ***************************************
Route::get('drugs','App\Http\Controllers\DrugController@getDrug');
Route::get('drug/{id}','App\Http\Controllers\DrugController@getDrugById');
 Route::post('addDrug','App\Http\Controllers\DrugController@addDrug');



 Route::put('updateDrug/{id}','App\Http\Controllers\DrugController@updateeee');

Route::delete('deleteDrug/{id}','App\Http\Controllers\DrugController@deleteDrug');

Route::get('productsByCategory/{id}','App\Http\Controllers\DrugController@productsByCategory');

// **************************** table orders ***************************************
Route::get('orders','App\Http\Controllers\OrderController@getOrder');
Route::get('orders/{id}','App\Http\Controllers\OrderController@getOrderById');
Route::post('storeOrder','App\Http\Controllers\OrderController@store');    // edit 
Route::put('updateOrder/{id}','App\Http\Controllers\OrderController@updateOrder');   // edit 
Route::delete('deleteOrder/{id}','App\Http\Controllers\OrderController@deleteOrder');


// **************************** table users ***************************************
Route::get('users','App\Http\Controllers\UserController@getUser');

Route::get('users/{id}', [UserController::class, "getUserById"]);

Route::post('addUser','App\Http\Controllers\UserController@addUser');
Route::put('updateUser/{id}','App\Http\Controllers\UserController@updateUser');
Route::delete('deleteUser/{id}','App\Http\Controllers\UserController@deleteUser');

// **************************** table categories  ***************************************
Route::get('categories','App\Http\Controllers\CategoryController@getCategory');
Route::get('categories/{id}','App\Http\Controllers\CategoryController@getCategoryById');
Route::post('addCategory','App\Http\Controllers\CategoryController@addCategory');
Route::put('updateCategory/{id}','Apparoller@updateCategory');
Route::delete('deleteCategory/{id}','App\Http\Controllers\CategoryController@deleteCategory');



// **************************** tables Cart ******************************************************************
Route::post('storeUserCart','App\Http\Controllers\CartController@storeCart');
Route::get('userCart/{id}','App\Http\Controllers\CartController@showCart');
Route::delete('deleteCart/{id}','App\Http\Controllers\CartController@deleteCart');
Route::put('updateCart/{id}','App\Http\Controllers\CartController@updateCart');




//rel bet user & cart & drug 
Route::post('store','App\Http\Controllers\CartController@store');
Route::put('update/{id}','App\Http\Controllers\CartController@update');
Route::delete('destroy/{id}','App\Http\Controllers\CartController@destroy');
Route::get('show/{id}','App\Http\Controllers\CartController@show');


