<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Drug;
class RelationOrderDrugController extends Controller
{


   //*********************** getOrdersByDrugs *************************** */
    public function getOrdersByDrugs($id)
    { 
   $drug = Drug::find($id);
    return $drug -> orders ;
      }   


 //*********************** getOrdersForDrugsIds *************************** */
    public function getOrdersForDrugsIds($id)
    { 
    return $drug = Drug::with('orders')-> find($id);
   
    
    }


    //*********************** getDrugsForOrdersIds *************************** */
    public function getDrugsForOrdersIds($id)
    { 
    return $order = Order::with('drugs')-> find($id);
    }


      //*********************** get Drugs For Orders Ids but not return all  attr drugs  *************************** */
      public function getDrugsForOrdersIdsNotAll($id)
      { 
      return $drug = Order::with(['drugs'=>function($q){
        $q->select ('drugs.id','trade_name_ar','price');
      }
      
      ])-> find($id);
      
      }


      //********************************** test  ******************************* */

      public function test($id)
      { 
        $drug = Drug::find($id);
  return $orders = $drug -> orders; // return orders for drugs id 

    return $drug = Drug::select('id','price','trade_name_ar') -> get(); //return all drugs 
    return $orders = Order::select('id','total_cost','status') -> get(); //return all orders 

      }



// ************************ mistake from start here ************************
      //**************************  save_orders_to_drug ******************************** */
  
      public function save_orders_to_drug(Request $request,$drug_id)
      { 
       
        // return $request;
        $drug = Drug::find($request -> drug_id);
        if(is_null($drug)){
            return response()->json(['message'=>'drug Not Found'],404);
          }
          
   $drug -> orders() -> attach ($request -> order_id) ;
     $drug->save();
    //   return response()->json(['message'=>'success'],200);
    return $drug;
        }  



        //******************************************************************************************* */
        // public function index()
        // {
        //    return CompanyResource::collection(Drug::all());
        // }   
        
        // public function store(CompanyStoreRequest $request)
        // {
        //     $drug = Drug::create($request->validated());  
        //     $drug->orders()->attach($request->input('order_id'));          
        
        //     return new CompanyResource($drug);
        // }


        //**************************************************************************************************** */
           //**********************  insert   done run  ************************************* */
        public function storeeee(Request $request)
{

    // $drug = Drug::create([
    //     'trade_name_ar' => 'زيثرون زيثرون',
    //     'trade_name_en' => 'hhhhhhhhhhhhhhhhhhh',
    //     'price'        => 199.99,
    //     'description' => 'hhhhhhhhhhhhhhhhhhh',
    //     'image'       => 'hhhhhhhhhh.jpg',
    //     'production_date'  => '2020-09-13',
    //     'expiry_date'  => '2023-09-13',
    //     'category_id'  => '7'
    // ]);



    $drug = Drug::find(37);               



    $order = Order::find([7,8]); 
    $drug->orders()->attach($order);
    $drug->save();
    return 'Success';
}
//******************************************************************************************* */



}