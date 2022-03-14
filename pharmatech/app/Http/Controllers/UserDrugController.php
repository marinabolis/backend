<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDrug;

class UserDrugController extends Controller
{
    // *************************** store user drug  ************************************
    public function store(Request $request)
    {
        $userdrug= new UserDrug;
        $userdrug->order_id = $request-> order_id;
        $userdrug->user_id = $request-> user_id;
        $result = $userdrug->save();
        if ($result){
        return ["result"=>"usergrug added"];

         }else{
           return ["result"=>"usergrug not  added"];
         }
        }

   // *************************** show user drug  ************************************
    public function show($id)
    {
            return UserDrug :: find($id);
    }


 // *************************** update  user drug  ************************************
    public function updateUserDrug(Request $request,$id)
    {
  
      $userdrug = UserDrug::find($id);
      if(is_null($userdrug)){
        return response()->json(['message'=>'userdrug Not Found'],404);
      }
      $userdrug->update($request->all());
      return response($userdrug,200);
    }
  
// *************************** delete   user drug  ************************************

public function deleteDrug(Request $request,$id)
  {   
     $userdrug = UserDrug::find($id);
     if(is_null($userdrug)){
      return response()->json(['message'=>'Drug Not Found'],404);
  }

  $userdrug->delete();
  return response()->json(null,204);
}




}
