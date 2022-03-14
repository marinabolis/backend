<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartDrug;

class CartDrugController extends Controller
{
    
    // *************************** store cart drug  ************************************
    public function store(Request $request)
    {
        $cartdrug= new CartDrug;
        $cartdrug->drug_id = $request-> drug_id;
        $cartdrug->cart_id = $request-> cart_id;
        $cartdrug->drug_quantity = $request-> drug_quantity;
        $result = $cartdrug->save();
        if ($result){
        return ["result"=>"cartdrug added"];

         }else{
           return ["result"=>"cartdrug not  added"];
         }
        }

   // *************************** show cart drug ************************************
    public function show($id)
    {
            return CartDrug :: find($id);
    }


//  // *************************** update  cart drug  ************************************
//     public function updateUserDrug(Request $request,$id)
//     {
  
//       $userdrug = UserDrug::find($id);
//       if(is_null($userdrug)){
//         return response()->json(['message'=>'userdrug Not Found'],404);
//       }
//       $userdrug->update($request->all());
//       return response($userdrug,200);
//     }
  
// *************************** delete   cart drug  ************************************

public function deleteCartDrug(Request $request,$id)
  {   
     $cartdrug = CartDrug::find($id);
     if(is_null($cartdrug)){
      return response()->json(['message'=>'Drug Not Found'],404);
  }

  $cartdrug->delete();
  return response()->json(null,204);
}


}
