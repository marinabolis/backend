<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;

class DrugController extends Controller
{
  // *********** get all drugs**********************
   public function getDrug()
  {
    return response()->json(Drug::all(),200);
  }


  // *************** get specific drug detail **********************
  
  public function getDrugById($id)
  {
  $drug = Drug::find($id);
  if(is_null($drug)){
    return response()->json(['message'=>'Drug Not Found'],404);
  }

  return response()->json($drug::find($id),200);
  }


// *********************addDrug***************************

  public function addDrug(Request $request)
  {

    $drug = Drug::create($request->all());
     return response($drug,201);

  }

// *********************updateDrug***************************

  public function updateDrug(Request $request,$id)
  {

    $drug = Drug::find($id);
    if(is_null($drug)){
      return response()->json(['message'=>'Drug Not Found'],404);
    }
    $drug->update($request->all());
    return response($drug,200);
  }

  
// *********************deleteDrug***************************
  public function deleteDrug(Request $request,$id)
  {   
     $drug = Drug::find($id);
     if(is_null($drug)){
      return response()->json(['message'=>'Drug Not Found'],404);
  }

  $drug->delete();
  return response()->json(null,204);
}





}


