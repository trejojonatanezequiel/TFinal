<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;
use App\User;

class UserController extends Controller
{
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) { 
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            return response()->json(['success' => $success], 200);
    }   else {
        return response()->json(['error'=>'Unauthorised'], 401); 
    }
}

public function index() {
    $users = User::all();
    return response()->json(['users'=>$users], 200);
}
public function register(Request $request)
 { 
    $validator = Validator::make($request->all(), [ 
        'name' => 'required', 
        'email' => 'required|email',
        'country' => 'required',
        'state' => 'required',
        'city' => 'required',
        'password' => 'required', 
        'c_password' => 'required|same:password', 
    ]);
    if ($validator->fails()) {
        return response()->json(['error'=>$validator->errors()], 401);
    }    
    
    $input = $request->all();
    $input['password'] = bcrypt($input['password']);
    $user = User::create($input);

    $success['token'] =  $user->createToken('MyApp')->accessToken;
    return response()->json(['success'=>$success], 200);
 }
public function profile() {
    $user = Auth::user(); 
    return response()->json(['success' => $user], 200); 
}
}
