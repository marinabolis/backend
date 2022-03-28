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
//    if($request->hasfile('image')){
//      $completeFileName = $request->file('image')->getClientOriginalName();
//      $fileNameOnly = pathinfo($completeFileName,PATHINFO_FILENAME);
//      $extenshion = $request->file('image')->getClientOriginalExtension();
//      $compPic = str_replace('', '_',$fileNameOnly).'_'.rand() . '_'.time(). '.'.$extenshion; //"concor_1213153442_1647133567.jpg"
//          $path = $request->file('image')->storeAs('public/drugs', $compPic);
//     // dd($path);  
//       $drug->image = $compPic;
//    }

//    $drug->production_date ;
//   $drug->expiry_date ; 
//   $drug->save();
//      $drug = Drug::create($request->all());
//      return response($drug,201);



// $file=$request->file('file');
// $uploadPath ="public/drugs";
// $originalImage=$file->getClientOriginalName();
// $file->move($uploadPath,$originalImage);
// $drugModel= new Drug();
// $data=$drugModel->addDrug($request->all());



$uploadFiles =$request->image->store('public/drugs');
$drug= new Drug;
$drug->trade_name_ar = $request-> trade_name_ar;
$drug->trade_name_en = $request-> trade_name_en;
$drug->price = $request-> price;
$drug->description = $request-> description;
$drug->image = $request-> image->hashName();
$drug->production_date = $request-> production_date;
$drug->expiry_date = $request-> expiry_date;
// $drug->category_id = $request-> category_id;
$drug->save();
return response($drug,201);



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


