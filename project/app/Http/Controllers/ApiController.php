<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
class ApiController extends Controller
{
    
public function register(Request $request) {
        
        $validator      =   Validator::make($request->all(), [
            
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            // 'phone_number' => ['required','numeric'],
            // 'address' => ['required', 'string'],
            // 'city' => ['required', 'string'],
            // 'state' => ['required', 'string'],
            // 'pincode' => ['required','string'],
            // 'gender' => ['required'],
         ]);
        
        if ($validator->fails()) {
            return response()->json(['success' =>0,"error"=>1,'message'=>$validator->errors()], 200);
        }

        $user = User::create([
                    'name'          =>  $request->name,
                    'email'         =>  $request->email,
                    'password'      =>  bcrypt($request->password)
        ]);

        
        
        $token = $user->createToken('TutsForWeb')->accessToken;

        return response()->json(['success'=>1,"error"=>0,'message'=>'Registered successfully!!','token' => $token], 200);
    }
    
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            
            User::where("id",auth()->user()->id)->update(
                            [
                                 "api_token" => $token,   
                            ]
                        )
                    
                    ;
            return response()->json(['success'=>1,"error"=>0,'message'=>'Logged in successfully!!','token' => $token,"user"=>auth()->user()], 200);
        } else {
            return response()->json(['success'=>0,"error"=>1,'message'=>'UnAuthorised'], 200);
        }
    }
   





}
