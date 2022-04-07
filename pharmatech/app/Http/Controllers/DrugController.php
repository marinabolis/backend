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




  //***************************************   testing ****************************************************
  public function storeTesting(Request $request)
  {
    if ($request->hasFile('drugs')) {
      $logo = $request->file('drugs');
      $fileName = date('Y') . $logo->getClientOriginalName();
      $request->image->storeAs('drugs', $fileName, 'public');
    }
    $drug = new Drug;
    $drug->trade_name_ar = $request->trade_name_ar;
    $drug->trade_name_en = $request->trade_name_en;
    $drug->price = $request->price;
    $drug->description = $request->description;
  
    $image = $request->file('image');
   
    $drug->image = $image->getClientOriginalName();
    
    $drug->production_date = $request->production_date;
    $drug->expiry_date = $request->expiry_date;

    $drug->save();
    return response($drug, 201);


  


  }


  //********************************  testing ****************************** */
  public function testingTesting(Request $request)
  {
    if ($request->hasFile('image')) {
      foreach ($request->file('image') as $image) {
        if ($upload = $image->store('drugs', 'public')) {
          return  response()->json($upload, 201);
        } else {
          return  response()->json("no", 403);
        }
      }
    }

  
    dd($request);
  
    $drug = new Drug;
    $drug->trade_name_ar = $request->trade_name_ar;
    $drug->trade_name_en = $request->trade_name_en;
    $drug->price = $request->price;
    $drug->description = $request->description;
    $drug->image = $request->image->hashName();

    $drug->production_date = $request->production_date;
    $drug->expiry_date = $request->expiry_date;
 
    $drug->save();
    return response($drug, 201);
  }


  //*************************************  testing update fun ************************************** */
  public function uploadProfilePhoto(Request $request,$id) {  

    $drug = Drug::find($id);

   
 
   
    if (is_null($drug)) {
      return response()->json(['message' => 'Drug Not Found'], 404);
    }
 
    if ($request->hasFile('image')) {
      $compliteFileName = $request->file('image')->getClientOriginalName();
      $filaNameOnly = pathinfo($compliteFileName, PATHINFO_FILENAME);
      $extension = $request->file('image')->getClientOriginalExtension();
      $comPic = str_replace(' ', '_', $filaNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
      $path = $request->file('image')->storeAs('public/drugs', $comPic);
      $drug->image = $comPic;
    }
    $drug->trade_name_ar = $request->trade_name_ar;
    $drug->trade_name_en = $request->trade_name_en;
    $drug->price = $request->price;
    $drug->description = $request->description;
    $drug->production_date = $request->production_date;
    $drug->expiry_date = $request->expiry_date;
    $drug->category_id = $request->category_id;
    $drug->update($request->all());
    if ($drug->save()) {
      return response()->json($drug, 201);
    } else {
      return  ['status' => false, 'message' => 'image could not be saved'];
    }



 
  }


  // ***************************************************************************************

  public function updateeee(Request $request,$id)     
  { $drug = Drug::find($id);
   
    
    //validation   image 
      if($request->hasfile('image'))
      { 

     $destination='public/drugs/'.$drug->image;   // once any b update img h delete old img & set new img
      if(File::exists($destination)){
      
     File::delete($destination);
       }
     $file = $request->file('image');
     $filename = time().'.'.$file->getClientOriginalExtension();
     $file->move('public/drugs/',$filename);
     $drug->image =$filename;
      }
  
    $drug->trade_name_ar = $request->trade_name_ar;
    $drug->trade_name_en = $request->trade_name_en;
    $drug->price = $request->price;
    $drug->description = $request->description;
    $drug->production_date = $request->production_date;
    $drug->expiry_date = $request->expiry_date;
    $drug->category_id = $request->category_id;
      if ( $drug->update()) {
        return response()->json($drug, 201);
      } else {
        return  ['status' => false, 'message' => 'image could not be saved'];
      }
  }




  public function mmm(Request $request , $id)     
  {
    
      $drug = Drug::find($id);
      if ($request->hasFile('image'))
        {
            $file      = $request->file('image');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
         
            $picture =  $request['code'].'.jpg';
            $file->move(public_path('public/drugs'), $picture);
            return response()->json(["message" => "Image Uploaded Succesfully"]);
        }
           $drug->trade_name_ar = $request->trade_name_ar;
    $drug->trade_name_en = $request->trade_name_en;
    $drug->price = $request->price;
    $drug->description = $request->description;
    $drug->production_date = $request->production_date;
    $drug->expiry_date = $request->expiry_date;
    $drug->category_id = $request->category_id;

 
         if ( $drug->update()) {
      return response()->json($drug, 201);
    } else {
      return  ['status' => false, 'message' => 'image could not be saved'];
    }
  }



}
