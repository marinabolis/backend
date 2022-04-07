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


  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $total_cost = 0;

    

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



  
}
