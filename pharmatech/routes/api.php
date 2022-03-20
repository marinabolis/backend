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

// Route::post('register','App\Http\Controllers\UserController@register');
// Route::post('login','App\Http\Controllers\UserController@login');

Route::post('/register' , [UserController::class , 'register']);
Route::post('/login' , [UserController::class , 'login']);

// **************************** table drugs ***************************************
Route::get('drugs','App\Http\Controllers\DrugController@getDrug');
Route::get('drug/{id}','App\Http\Controllers\DrugController@getDrugById');
Route::post('addDrug','App\Http\Controllers\DrugController@addDrug');
Route::put('updateDrug/{id}','App\Http\Controllers\DrugController@updateDrug');
Route::delete('deleteDrug/{id}','App\Http\Controllers\DrugController@deleteDrug');

Route::get('productsByCategory/{id}','App\Http\Controllers\DrugController@productsByCategory');
Route::get('productsByuser/{id}','App\Http\Controllers\DrugController@productsByuser');
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
Route::put('updateCategory/{id}','Apparoller@updateCategory');
Route::delete('deleteCategory/{id}','App\Http\Controllers\CategoryController@deleteCategory');

// **************************** tables UserDrug ******************************************************************
Route::post('storeUserDrug','App\Http\Controllers\UserDrugController@store');
Route::get('userdrug/{id}','App\Http\Controllers\UserDrugController@show');
Route::put('updateUserDrug/{id}','App\Http\Controllers\UserDrugController@updateUserDrug');
Route::delete('deleteUserDrug/{id}','App\Http\Controllers\UserDrugController@deleteUserDrug');

// **************************** tables Cart ******************************************************************
Route::post('storeUserCart','App\Http\Controllers\CartController@storeCart');
Route::get('userCart/{id}','App\Http\Controllers\CartController@getUserHasCart');
Route::delete('deleteCart/{id}','App\Http\Controllers\CartController@deleteCart');
Route::put('updateCart/{id}','App\Http\Controllers\CartController@updateCart');

// **************************** tables CartDrug ******************************************************************
Route::post('storeCartDrug','App\Http\Controllers\CartDrugController@store');
Route::get('CartDrug/{id}','App\Http\Controllers\CartDrugController@show');
Route::delete('deleteCartDrug/{id}','App\Http\Controllers\CartDrugController@deleteCartDrug');
Route::put('updateCartDrug/{id}','App\Http\Controllers\CartDrugController@updateCartDrug');
// **************************** tables OrderDrug ******************************************************************

Route::post('storeOrderDrug','App\Http\Controllers\OrderDrugController@storeOrderDrug');
Route::get('orderDrug/{id}','App\Http\Controllers\OrderDrugController@showOrderDrug');
Route::delete('deleteOrderDrug/{id}','App\Http\Controllers\OrderDrugController@deleteOrderDrug');
Route::put('updateOrderDrug/{id}','App\Http\Controllers\OrderDrugController@updateOrderDrug');
