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
//Route::post('addDrug','App\Http\Controllers\DrugController@storeTesting');
//Route::post('addDrug','App\Http\Controllers\DrugController@testingTesting');

Route::put('updateDrug/{id}','App\Http\Controllers\DrugController@updateDrug');
Route::delete('deleteDrug/{id}','App\Http\Controllers\DrugController@deleteDrug');

Route::get('productsByCategory/{id}','App\Http\Controllers\DrugController@productsByCategory');
//Route::post('storeTesting','App\Http\Controllers\DrugController@storeTesting');
// **************************** table orders ***************************************
Route::get('orders','App\Http\Controllers\OrderController@getOrder');
Route::get('orders/{id}','App\Http\Controllers\OrderController@getOrderById');
Route::post('storeOrder','App\Http\Controllers\OrderController@store');    // edit 
Route::put('updateOrder/{id}','App\Http\Controllers\OrderController@updateOrder');   // edit 
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
Route::get('userCart/{id}','App\Http\Controllers\CartController@showCart');
Route::delete('deleteCart/{id}','App\Http\Controllers\CartController@deleteCart');
Route::put('updateCart/{id}','App\Http\Controllers\CartController@updateCart');


// test rel 
Route::get('getUserHasCart','App\Http\Controllers\CartController@getUserHasCart');
Route::get('getUserHasNotCart','App\Http\Controllers\CartController@getUserHasNotCart');
Route::get('getUserWithCart/{id}','App\Http\Controllers\CartController@getUserWithCart');

//rel bet user & cart & drug 
Route::post('store','App\Http\Controllers\CartController@store');
Route::put('update/{id}','App\Http\Controllers\CartController@update');
Route::delete('destroy/{id}','App\Http\Controllers\CartController@destroy');
Route::get('show/{id}','App\Http\Controllers\CartController@show');
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




// **************************** rel bet  Order & Drug ************************************************


// Route::get('getOrdersByDrugs/{id}','App\Http\Controllers\RelationOrderDrugController@getOrdersByDrugs');
// Route::get('getOrdersForDrugsIds/{id}','App\Http\Controllers\RelationOrderDrugController@getOrdersForDrugsIds');
// Route::get('getDrugsForOrdersIds/{id}','App\Http\Controllers\RelationOrderDrugController@getDrugsForOrdersIds');
// Route::get('getDrugsForOrdersIdsNotAll/{id}','App\Http\Controllers\RelationOrderDrugController@getDrugsForOrdersIdsNotAll');


// Route::get('test/{id}','App\Http\Controllers\RelationOrderDrugController@test');
// mistake from start here


// Route::post('save_orders_to_drug/{drug_id}','App\Http\Controllers\RelationOrderDrugController@save_orders_to_drug');
// Route::post('storeeee','App\Http\Controllers\RelationOrderDrugController@storeeee');




// **************************** rel bet Cart & Drug ************************************************

Route::get('getDrugsForCartsIds/{id}','App\Http\Controllers\RelationCartDrugController@getDrugsForCartsIds');
Route::post('storeDrugsInCart','App\Http\Controllers\RelationCartDrugController@storeDrugsInCart'); 
Route::delete('removeDrugFromCart/{id}','App\Http\Controllers\RelationCartDrugController@removeDrugFromCart'); // not run 

Route::delete('ddeleteeeeeelete/{id}','App\Http\Controllers\RelationCartDrugController@deleteeeee');



// ****************************  test insert **********

Route::post('testAgain','App\Http\Controllers\RelationCartDrugController@testAgain'); 