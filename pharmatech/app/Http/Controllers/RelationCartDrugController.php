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
   
}
