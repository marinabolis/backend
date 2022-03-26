<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;

use App\Http\Resources\OrderResource;
class OrderController extends Controller
{

  // *********** get all orders**********************
    public function getOrder()
    {

// **********resource 

  //  return OrderResource::collection(Order::all());


      return response()->json(Order::all(),200);
    }

// *************** get specific drug detail **********************
    public function getOrderById($id)
    {
    $order = Order::find($id);
    if(is_null($order)){
      return response()->json(['message'=>'Order Not Found'],404);
    }
  
    return response()->json($order::find($id),200);
    }

// *********************addOrder***************************

public function addOrder(Request $request)
{
// // *******************  validation *****************
//       $validator = Validator::make($request -> all(),[
//         'total_cost' => 'required',
//         'shipping_address' => 'required',
//         'status' => 'required',
//         // 'user_id' => 'required'
//       ]);
// if ( $validator -> fails()){
//   return Response() ->json($validator-> errors());
// }



// $order = Order::create($request->validated());  
// $order->drugs()->attach($request->input('drug_id'));          

// return new OrderResource($order);


// ******************** ********************

  $order = Order::create($request->all());
   return response($order,201);

}


// *********************updateOrder***************************

public function updateOrder(Request $request,$id)
{

  $order = Order::find($id);
  if(is_null($order)){
    return response()->json(['message'=>'Order Not Found'],404);
  }
  $order->update($request->all());
  return response($order,200);
}


// *********************deleteOrder***************************
public function deleteOrder(Request $request,$id)
{   
   $order = Order::find($id);
   if(is_null($order)){
    return response()->json(['message'=>'Order Not Found'],404);
}

$order->delete();
return response()->json(null,204);
}

  
}
