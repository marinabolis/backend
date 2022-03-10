<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

  // *********** get all orders**********************
    public function getOrder()
    {
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
