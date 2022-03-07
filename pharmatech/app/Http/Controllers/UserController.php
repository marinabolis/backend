<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Hash;
use App\Models\User;
// use App\User;

// use Tymon\JWTAuth\Facedes\JWTAuth;
// use Tymon\JWTAuth\Exceptions\JWTExceptions;

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


    public function index()
    {
        
    }


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
                'role'=>$request->role
               
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
        
        $user = auth()->user();
        $data['token']=auth()->claims([
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

    
    





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}