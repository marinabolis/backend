<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Validator;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\File;
//for display image in drugs 2 lines
// use Illuminate\Support\Facades\File;
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
    return $productsByCategory;
  }




  //***************************************   testing ****************************************************

  // $validatedData = Validator::make($request->all(), [
  //     'company_logo' => 'required|mimes:jpg,png,jpeg|max:3048',
  //     'company_name' => 'required|max:130',
  //     'company_email' => 'required|email|unique:partners',
  //     'password'  =>  'required|min:6',
  //     'phone'  =>  'required|min:6|max:11',
  //     'address'  =>  'required',
  //     'city'  =>  'required|string',
  //     'country' =>  'required|string' ,
  //     'business_category'  =>  'required|string',
  //     'website_link' =>  'nullable|string',
  //     'facebook_page' =>  'nullable|string'
  // ]);

  // if ($validatedData->fails()) {
  //     return Response::json(['success' => false, 'message' => $validatedData->errors()], 400);
  // }

  // $saved = Partner::create($request->all());
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
    // $drug->image = $request-> image->getClientOriginalName();
    $image = $request->file('image');
    // dd($request->file('image'));
    $drug->image = $image->getClientOriginalName();
    //$drug->image = $request->file('image')->getClientOriginalName();
    $drug->production_date = $request->production_date;
    $drug->expiry_date = $request->expiry_date;
    // $drug->category_id = $request-> category_id;
    $drug->save();
    return response($drug, 201);


    // $partner->save();
    // return Response::json(['success' => 'Partner created successfully!', 'created_partner' => $partner], 201);


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

    //  $uniqueFileName = uniqid() . $request->get('image')->getClientOriginalName() . '.' . $request->get('image')->getClientOriginalExtension();
    dd($request);
    //  $request->get('image')->move(public_path('drugs') . $uniqueFileName);
    // $file = $request->file('upload_file');
    // $uniqueFileName = uniqid() . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();

    // if($request->has('image')) {

    //   $image = $request->file('image');
    //   $filename = $image->getClientOriginalName();
    //   request()->$image->move(public_path('drugs'), $filename);
    //   //dd($request);
    //   //$sounds->image = $request->file('image')->getClientOriginalName();
    // }
    //dd($request);
    // $uploadFiles =$request('image')->store('uploads', 'public');
    //$uploadFiles =$request->image->store('public/drugs');
    $drug = new Drug;
    $drug->trade_name_ar = $request->trade_name_ar;
    $drug->trade_name_en = $request->trade_name_en;
    $drug->price = $request->price;
    $drug->description = $request->description;
    $drug->image = $request->image->hashName();

    //  $drug->image =$request->get('image')->move(public_path('drugs') . $uniqueFileName);
    //$drug->image = $request->file('image')->getClientOriginalName();
    // $drug->image = $request-> image->hashName();
    $drug->production_date = $request->production_date;
    $drug->expiry_date = $request->expiry_date;
    // $drug->category_id = $request-> category_id;
    $drug->save();
    return response($drug, 201);
  }


  //*************************************  testing update fun ************************************** */
  public function uploadProfilePhoto(Request $request,$id) {  
    // $drug = new Drug;
    $drug = Drug::find($id);

   
 
    // dd($drug);
    if (is_null($drug)) {
      return response()->json(['message' => 'Drug Not Found'], 404);
    }
    // if ($request->hasFile('image'))
    // {
    //   $drug = new Drug;
    //     $file      = $request->file('image');
    //     $filename  = $file->getClientOriginalName();
    //     $extension = $file->getClientOriginalExtension();
    //     // $picture   = date('His').'-'.$filename;
    //     $picture =  $request['code'].'.jpg';
    //     $file->move(public_path('/drugs'), $picture);
    //     // return response()->json(["message" => "Image Uploaded Succesfully"]);
    //     $drug->image = $file;
    // }
    // else
    // {
    //     return response()->json(["message" => "Select image first."]);
    // }

    // $drug = new Drug;
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



    // $drug->update($request->all());

    // $drug->update($request->all());
    // $drug->save();

    // return response($drug, 200);
  }


  // ***************************************************************************************

  public function updateeee(Request $request,$id)     
  { $drug = Drug::find($id);
   
     // dd($drug);
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

  //**********************************  test again ************* */
  // public function mmm(Request $request,$id)
  // {

  //   // //validatin image 
  //   $drug = Drug::find($id);
  //   //dd($drug);
  //   // $drug = new Drug;
  //   if ($request->hasFile('image')) {
  //     $compliteFileName = $request->file('image')->getClientOriginalName();
  //     $filaNameOnly = pathinfo($compliteFileName, PATHINFO_FILENAME);
  //     $extension = $request->file('image')->getClientOriginalExtension();
  //     $comPic = str_replace(' ', '_', $filaNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
  //     $path = $request->file('image')->storeAs('public/drugs', $comPic);
  //     $drug->image = $comPic;
  //   }

  //   // $category = $request->category;
  //   $drug->trade_name_ar = $request->trade_name_ar;
  //   $drug->trade_name_en = $request->trade_name_en;
  //   $drug->price = $request->price;
  //   $drug->description = $request->description;
  //   $drug->production_date = $request->production_date;
  //   $drug->expiry_date = $request->expiry_date;
  //   $drug->category_id = $request->category_id;

  //    $drug->update($request->all());
  //   if ($drug->save()) {
  //     return response()->json($drug, 201);
  //   } else {
  //     return  ['status' => false, 'message' => 'image could not be saved'];
  //   }
  // }


  public function mmm(Request $request , $id)     
  {
    
      $drug = Drug::find($id);
      if ($request->hasFile('image'))
        {
            $file      = $request->file('image');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            // $picture   = date('His').'-'.$filename;
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

      //  $drug->update();
         if ( $drug->update()) {
      return response()->json($drug, 201);
    } else {
      return  ['status' => false, 'message' => 'image could not be saved'];
    }
  }



}
