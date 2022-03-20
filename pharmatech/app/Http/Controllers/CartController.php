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
        $cart= new Cart;
        $cart->user_id = $request-> user_id;
        $result = $cart->save();
        if ($result){
        return ["result"=>"cart added"];

         }else{
           return ["result"=>"cart not  added"];
         }
        }

   // *************************** show Cart  ************************************
    public function showCart($id)
    {
            return Cart :: find($id);
    }

  
// *************************** delete   Cart ************************************

public function deleteCart(Request $request,$id)
  {   
     $cart = Cart::find($id);
     if(is_null($cart)){
      return response()->json(['message'=>'Cart Not Found'],404);
  }

  $cart->delete();
  return response()->json(null,204);
}



  // *************************** update  Cart ************************************
  public function updateCart(Request $request,$id)
  {

    $cart = Cart::find($id);
    if(is_null($cart)){
      return response()->json(['message'=>'Cart Not Found'],404);
    }
    $cart->update($request->all());
    return response($cart,200);
  }

// *************************** rel bet user & cart ************************************
// *************************** getUserHasCart ************************
public function getUserHasCart(Request $request)
{
return User :: whereHas('cart') ->get();
}


}
