<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDrug;

class OrderDrugController extends Controller
{
     // *************************** store Order drug  ************************************
     public function storeOrderDrug(Request $request)
     {
         $orderdrug= new OrderDrug;
         $orderdrug->order_id = $request-> order_id;
         $orderdrug->drug_id = $request-> drug_id;
         $result = $orderdrug->save();
         if ($result){
         return ["result"=>"orderdrug added"];

          }else{
            return ["result"=>"orderdrug not  added"];
          }
         }

    // *************************** show Order drug ************************************
     public function showOrderDrug($id)
     {
             return OrderDrug :: find($id);
     }



 // *************************** delete   Order drug  ************************************

 public function deleteOrderDrug(Request $request,$id)
   {
      $orderdrug = OrderDrug::find($id);
      if(is_null($orderdrug)){
       return response()->json(['message'=>'orderdrug Not Found'],404);
   }

   $orderdrug->delete();
   return response()->json(null,204);
 }

// *************************** update   Order drug  ************************

 public function updateOrderDrug(Request $request,$id)
 {

   $orderdrug = OrderDrug::find($id);
   if(is_null($orderdrug)){
     return response()->json(['message'=>'orderdrug Not Found'],404);
   }
   $orderdrug->update($request->all());
   return response($orderdrug,200);
 }
 


}
