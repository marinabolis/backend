<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;

class DrugController extends Controller
{
   public function getDrug()
  {
    return response()->json(Drug::all(),200);
  }

  

 
}
