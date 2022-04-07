<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Validator;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\DB;   // class DB --> joinDrugCategory fun 


class DrugController extends Controller
{
  // *********** get all drugs**********************
  public function getDrug()
  {
    return response()->json(Drug::all(), 200);
  }


  // *************** get specific drug detail **********************

  public function getDrugById($id)
  {
    $drug = Drug::find($id);
    if (is_null($drug)) {
      return response()->json(['message' => 'Drug Not Found'], 404);
    }

    return response()->json($drug, 200);
  }


  // *********************addDrug***************************

  public function addDrug(Request $request)
  {

    // //validatin image 
    $drug = new Drug;
    if ($request->hasFile('image')) {
      $compliteFileName = $request->file('image')->getClientOriginalName();
      $filaNameOnly = pathinfo($compliteFileName, PATHINFO_FILENAME);
      $extension = $request->file('image')->getClientOriginalExtension();
      $comPic = str_replace(' ', '_', $filaNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
      $path = $request->file('image')->storeAs('public/drugs', $comPic);
      $drug->image = $comPic;
    }

    $category = $request->category;
    $drug->trade_name_ar = $request->trade_name_ar;
    $drug->trade_name_en = $request->trade_name_en;
    $drug->price = $request->price;
    $drug->description = $request->description;
    $drug->production_date = $request->production_date;
    $drug->expiry_date = $request->expiry_date;
    $drug->category_id = $request->category_id;
    if ($drug->save()) {
      return response()->json($drug, 201);
    } else {
      return  ['status' => false, 'message' => 'image could not be saved'];
    }
  }

  // *********************updateDrug***************************

  public function updateDrug(Request $request, $id)
  {
    $drug = Drug::find($id);
    if (is_null($drug)) {
      return response()->json(['message' => 'Drug Not Found'], 404);
    }

  

    $drug->update($request->all());
    $drug->save();

    return response($drug, 200);
  }


  // *********************deleteDrug***************************
  public function deleteDrug(Request $request, $id)
  {
    $drug = Drug::find($id);
    if (is_null($drug)) {
      return response()->json(['message' => 'Drug Not Found'], 404);
    }

    $drug->delete();
    return response()->json(null, 204);
  }


 

  public function productsByCategory($id)
  {
    $productsByCategory = Category::where('id', $id)->with('drugs')->get();
    return $productsByCategory;
  }



}
