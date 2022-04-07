<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Hash;
use App\Models\User;
use Illuminate\Support\Facedes\Auth;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\UserNotDefinedException;
use Tymon\JWTAuth\Facades\JWTAuth; 





class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

// ************ register *******************

    public function register(Request $request)
    {
        $user = User ::where('email',$request['email'])->first();
        if($user)
            
      {  
        $response['status']=0;
        $response['message']='email already exists';
        $response['code']=409;
       }
       //if not exists 
        else{
            $user = User ::create([
                'name' =>$request-> name,
                'email'=>$request-> email,
                'password'=>bcrypt($request->password),
                'city'=>$request-> city,
                'street'=>$request->street,
                // 'role'=>$request->role
               
            ]);
    
            $response['status']=1;
            $response['message']='done';
            $response['code']=200;
        }
       
        return response()->json($response);
        
    }


   // ************ login *******************

    public function login(Request $request)
    {
     $credentials = $request->only('email','password');
        try{
            // if email & pass incoreect
            if(!JWTAuth::attempt($credentials))
       
            {
                $response['status']=0;
                $response['code']=401;
                $response['data']=null;
                $response['message']='email or password is incoreect';
                return response()->json($response);
            }


        } catch(JWTExceptions $e){
            $response['data']=null;
            $response['code']=500;
            $response['message']='could Not create Token';
            return response()->json($response);
        }


        
    //    if email & pass successfully
        $user = auth()->user();
        $data['token']=auth()->claims([
            'city' => $user->city,               // 
            'user_id' => $user-> id,
            'email' => $user-> email,
            'role'=>$user-> role
        ])->attempt($credentials);

        $response['data']= $data;
        $response['status']=1;
        $response['code']=200;
        $response['message']='login successfully';
        return response()->json($response);
    }




    // *********** get all users**********************
    public function getUser()
    {
      return response()->json(User::all(),200);
    }

// *************** get specific user detail **********************
    public function getUserById(Request $request, $id)
    {
   
    $user = User::find($id);
  
    if(is_null($user)){
      return response()->json(['message'=>'User Not Found'],404);
    }
  
    return response()->json($user,200);
    }

// *********************addUser***************************

public function addUser(Request $request)
{

  $user = User::create($request->all());
   return response($user,201);

}


// *********************updateUser***************************

public function updateUser(Request $request,$id)
{

  $user = User::find($id);
  if(is_null($user)){
    return response()->json(['message'=>'User Not Found'],404);
  }
  $user->update($request->all());
  $user->password = bcrypt($request->password);
  $user->save();
  return response($user,200);


}


// *********************deleteUser***************************
public function deleteUser(Request $request,$id)
{   
   $user = User::find($id);
   if(is_null($user)){
    return response()->json(['message'=>'User Not Found'],404);
}

$user->delete();
return response()->json(null,204);
}


 
  
}