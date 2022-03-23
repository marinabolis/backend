<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Drug;
class RelationCartDrugController extends Controller
{
       //*********************** getDrugsForCartsIds (show) *************************** */
       public function getDrugsForCartsIds($id)
       { 
       return $cart = Cart::with('drugs')-> find($id);
       }



         //**********************  insert   done run  ************************************* */
         public function storeDrugsInCart(Request $request,$id)
         { 
           
          $cart = Cart::find($id); 

             if (!$cart){

              return ["result"=>"store Drugs In Cart Not added"];}
              else{ 
          $cart -> drugs() -> syncWithoutDetaching ([$request -> id]) ;
          return response()->json(['message'=>'success'],200);
              } 
            } 
            //  $cart = Cart::find(20);               
         
            //  $drug = Drug::find([41,42]); 
            // //  $quantity=CartDrug::find(20);   
            //  $cart->drugs()->attach($drug);
            //  $cart->save();
            //  return 'Success';
            // $cart = Cart::find($id); 
            // return    $cart;
            // $drug = Drug::find($request -> id);

          // $drug= new Drug;
          //   $drug->id = $request->id;
          //     // return    $drug;
          //   $result2 = $drug->save();

          // $cart -> drugs() -> attach ($request -> id) ;    imp 



          // $cart -> drugs() -> attach ([$request -> id, $request -> drug_quantity]) ;      imp*****

          // $cart -> drugs() -> syncWithoutDetaching ([$request -> id]) ;
        //  $cart->save();
        //  return    $cart;
        //   return response()->json(['message'=>'success'],200);

        // $cart->drugs()->attach($result2);
        // return 'Success';

      //*************************************************************************** */      
    //         $cart= new Cart;
    //         // return    $cart;
    //         $cart->id = $request-> id;
    //         // return    $cart;
    //         $result = $cart->save();

    //         // return    $result;
    //         if (!$result){
    //           return ["result"=>"cart not  added"];}
    //           else{
    //         $drug= new Drug;
    //         $drug->id = $request->id;
    //           return    $drug;
    //         $result2 = $drug->save();

    //         $cart->drugs()->attach($drug);
    //  return ["result"=>"cart added"];
    //           }
            //  else{
            //    return ["result"=>"cart not  added"];
            //  }


//************************************************************************************** */



      //       $drug = Drug::find($request -> drug_id);
      //       if(is_null($drug)){
      //           return response()->json(['message'=>'drug Not Found'],404);
      //         }
              
      //  $drug -> orders() -> attach ($request -> order_id) ;
      //    $drug->save();
      //   //   return response()->json(['message'=>'success'],200);
      //   return $drug;

            

         

   
}
