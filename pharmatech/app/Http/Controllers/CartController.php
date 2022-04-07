<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Drug;
use App\Models\User;

class CartController extends Controller
{

  // *************************** store Cart  ************************************
  public function storeCart(Request $request)
  {
    $cart = new Cart;
    $cart->user_id = $request->user_id;
    $result = $cart->save();
    if ($result) {
      return ["result" => "cart added"];
    } else {
      return ["result" => "cart not  added"];
    }
  }

  // *************************** show Cart  ************************************
  public function showCart($id)
  {
    
    $cart = Cart::with('drugs')->where('user_id', $id)->first();
    return  $cart;
  }


  // *************************** delete   Cart ************************************

  public function deleteCart(Request $request, $id)
  {
    $cart = Cart::find($id);
    if (is_null($cart)) {
      return response()->json(['message' => 'Cart Not Found'], 404);
    }

    $cart->delete();
    return response()->json(null, 204);
  }



  // *************************** update  Cart ************************************
  public function updateCart(Request $request, $id)
  {

    $cart = Cart::find($id);
    if (is_null($cart)) {
      return response()->json(['message' => 'Cart Not Found'], 404);
    }
    $cart->update($request->all());
    return response($cart, 200);
  }









  // *************************** rel bet user & cart ************************************
  // *************************** getUserHasCart ************************
  public function getUserHasCart(Request $request)
  {
    return User::whereHas('cart')->get();
  }

  // *************************** getUserHasNotCart ************************

  public function getUserHasNotCart(Request $request)
  {
    return User::whereDoesntHave('cart')->get();
  }


  // *************************** getUserWithCart ************************

  public function getUserWithCart(Request $request, $id)
  {
    $cart = Cart::with([
      'user' => function ($q) {
        $q->select('id', 'name', 'city');
      }
    ])->find($id);
    return $cart;
  }


  //******************************** rel  cart & user  & drug ******************8 */
  //******************************** fun store ******************8 */

  public function store(Request $request)
  {
 
    $cart = Cart::create([
   
      'user_id' => $request->id
    ]);
    $cart->save();

    foreach ($request->cartItem as $drug) {
      $selectedDrug = Drug::where('id', $drug['id'])->first();
      if ($selectedDrug) {
        $count = $drug['drug_quantity'];

        $cart->drugs()->attach($selectedDrug->id, ['drug_quantity' => $count]);
      }
    }

    $cart->save();

    return Cart::where('id', $cart->id)->with('drugs')->first();
  }

  //*********************** getDrugsForCartsIds (updaTE) *************************** */
  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {


    $cart = Cart::with('drugs', 'user')->where('user_id', $request->id)->first();

    // dd( $cart);
    $cart->drugs()->detach();

    foreach ($request->cartItem as $drug) {
      $selectedDrug = Drug::where('id', $drug['id'])->first();
      if ($selectedDrug) {
        $count = $drug['drug_quantity'];

        $cart->drugs()->attach($selectedDrug->id, ['drug_quantity' => $count]);
      }
    }

    $cart->save();

    return Cart::where('id', $cart->id)->with('drugs')->first();
  }


  //************************* destroy ************************************* */
  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    return Cart::where('user_id', $id)->delete();
  }
  //***************************** show ************************************ */
  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $cart = Cart::with('drugs')->where('user_id', $id)->first();
  

    return response()->json($cart, 200);
  }
}
