<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Drug;
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

// public function addOrder(Request $request)
// {
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

  // $order = Order::create($request->all());
  //  return response($order,201);



  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total_cost = 0;

        // if ($request->user()->role == 'admin') {
        //     if (!$request->user_id) {
        //         return response()->json('Please Provide User', 404);
        //     }
        //     $order = Order::create([
        //         'user_id' => $request->user_id,
        //         'shipping_address' => $request->shipping_address,
        //     ]);
        //     $order->save();

        //     foreach ($request->products as $product) {
        //         $selectedProduct = Product::where('id', $product['id'])->first();
        //         if ($selectedProduct) {
        //             $count = $product['quantity'];
        //             $total_cost += $selectedProduct->price * $count;

        //             $order->products()->attach($selectedProduct->id, ['product_quantity' => $count]);
        //         }
        //     }
        //     $order->update([
        //         'total_cost' => $total_cost
        //     ]);

        //     $order->save();


        //     return Order::where('id', $order->id)->with('products')->first();
        // }

        $order = Order::create([
            'user_id' => $request->id,
            'shipping_address' => $request->city,
        ]);

        $order->save();

        foreach ($request->drugs as $drug) {  
            $selectedDrug = Drug::where('id', $drug['id'])->first();
            if ($selectedDrug) {
                $count = $drug['pivot']['drug_quantity'];
                $total_cost += $selectedDrug->price * $count;

                $order->drugs()->attach($selectedDrug->id, ['drug_quantity' => $count]);
            }
        }
        $order->update([
            'total_cost' => $total_cost
        ]);

        $order->save();


        return Order::where('id', $order->id)->with('drugs')->first();
    }
// }


// *********************updateOrder***************************

// public function updateOrder(Request $request,$id)
// {

//   $order = Order::find($id);
//   if(is_null($order)){
//     return response()->json(['message'=>'Order Not Found'],404);
//   }
//   $order->update($request->all());
//   return response($order,200);
// }


// ********************* updateOrder new ***************************
/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param int $id
* @return \Illuminate\Http\Response
*/
public function updateOrder(Request $request, $id)
{

$order = Order::find($id);

// if (!$order) {
// return "No Order Found";
// }

// if (!$request->anyFilled($request->all()) == null) {
// return 'Please Enter A valid Value';
// }

// if ($order)
// ]);
$order->status = $request->status;
$order->save();
return response()->json(array('order' => $order), 200);
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




// *********************deleteOrder new not used now ***************************
public function destroy(Request $request, $id, Response $response)
{

$order = Order::find($id);

if (!$order) {

return response()->json('No order found', 404);
}

if ($request->user()->role == 'admin') {

return Order::destroy($id);
}

if ($request->user()->role !== "admin" && !Order::where("user_id", $request->user()->id)->get()->find($id)) {

return "denied";
}



return Order::destroy($id);
} 

// *********************  rel bet user & ***************************


  
}
