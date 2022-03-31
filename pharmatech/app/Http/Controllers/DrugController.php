<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;
use App\Models\Category;
use App\Models\User;
//for display image in drugs 2 lines
// use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;   // class DB --> joinDrugCategory fun 


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

  return response()->json($drug,200);
  }


// *********************addDrug***************************

  public function addDrug(Request $request)
  {
//    // this condition to display image 
//    $drug=new Drug;
//    $drug->trade_name_ar;
//   $drug->trade_name_en;
//   $drug->price   ;
//   $drug->description ;
  
// //validatin image 
$drug= new Drug;
if($request->hasFile('image')) { 

  $compliteFileName = $request->file('image')->getClientOriginalName();
  $filaNameOnly = pathinfo($compliteFileName , PATHINFO_FILENAME);
  $extension = $request->file('image')->getClientOriginalExtension();
  $comPic = str_replace(' ' , '_' , $filaNameOnly).'-'.rand() . '_'.time(). '.'.$extension;
  $path = $request->file('image')->storeAs('public/drugs' , $comPic);
  $drug->image=$comPic;
}

// $uploadFiles =$request->image->store('public/storage/drugs');
$category = $request->category;
$drug->trade_name_ar = $request-> trade_name_ar;
$drug->trade_name_en = $request-> trade_name_en;
$drug->price = $request-> price;
$drug->description = $request-> description;
// $drug->image = $request-> image->hashName();
$drug->production_date = $request-> production_date;
$drug->expiry_date = $request-> expiry_date;
$drug->category_id = $request-> category_id;
if($drug->save()){
  return response()->json($drug, 201);
} else {
return  ['status' => false, 'message' => 'image could not be saved'];
}



// $result = $drug->save();
// if ($result){
// return ["result"=>"drug added"];

// }else{
// return ["result"=>"drug not added"];
// }

}


  

  //   $drug = Drug::create($request->all());
  //    return response($drug,201);
  // }
  

// *********************updateDrug***************************

  public function updateDrug(Request $request,$id)
  {
    $drug = Drug::find($id);
    if(is_null($drug)){
      return response()->json(['message'=>'Drug Not Found'],404);
    }
    
//     //****************************************************** */
//     $drug->trade_name_ar = $request-> trade_name_ar;  // names of database  ( model/  drug page)
//     $drug->trade_name_en = $request->trade_name_en;
//     $drug->price         = $request->price;
//     $drug->description = $request->description;
  
  
//   //validation   image 
//     if($request->hasfile('image'))
//     {

//    $destination='public/drugs/'.$drug->image;   // once any b update img h delete old img & set new img
//     if(File::exists($destination)){
//    File::delete($destination);
//      }
//    $file = $request->file('image');
//    $filename = time().'.'.$file->getClientOriginalExtension();
//    $file->move('public/drugs/',$filename);
//    $drug->image =$filename;
//     }
//     $drug->production_date = $request->production_date;
//     $drug->expiry_date = $request->expiry_date;
//     $drug->update();
// //************************************************ */

     $drug->update($request->all());
    $drug->save();

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


// *********************join 2 tables (drug & category )***************************
// public function joinDrugCategory()
// { 

// $data = DB::table('categories')
//     ->join('drugs','categories.id','=','drugs.category_id')
//     ->select('categories.name','drugs.trade_name_ar','drugs.trade_name_en','drugs.price')
//     ->get();
// return $data ;
//   }  

public function productsByCategory($id)
{ 
$productsByCategory = Category::where('id', $id)->with('drugs')->get();
return $productsByCategory ;
  }  
 



}


