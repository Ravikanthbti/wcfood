<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
     

    public function addDeliveryAddress(Request $request){

       // print_r($request->all());

        $user = User::where('id',Auth::id())
               ->update([
                   'full_address'=>$request->full_address,
                   'street'=>$request->street,
                   'city'=>$request->city,
                   'state'=>$request->state,
                   'postcode'=>$request->postcode

               ]);

    return redirect()->back()->with('message','Address Successfully Change ');


    }

    public function updateDeliveryAddress(Request $request){


         $this->validate($request,[
            'full_address'=>'required', 
            'street'=>'required',
            'phone'=>'required',
            'state'=>'required',
            'city'=>'required',
            'postcode'=>'required',         
       
        ]);
         





        $user = User::where('id',Auth::id())
               ->update([
                   'phone' =>$request->phone,
                   'full_address'=>$request->full_address,
                   'street'=>$request->street,
                   'city'=>$request->city,
                   'state'=>$request->state,
                   'postcode'=>$request->postcode

               ]);

        return redirect()->back()->with('message','Address Successfully Change ');
    }






}
