<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Restaurant;
use App\Subscribe;
use App\Contact;
use Redirect;
use Alert;
use Mail;
use Auth;
use App\Mail\SubscribeMail;
use Nexmo\Laravel\Facade\Nexmo;
use App\User;
use Session;
class FrontendController extends Controller
{
    
    public function index(){

    $data['restaurants'] = Restaurant::all()->random(3);
        return view('frontend.index',$data);
    }






     public function subscribeStore(Request $request){

     $this->validate($request,[
       
     'email'=>'required|email',
      
   
    ]);
     
    $subscribes = new Subscribe; 
    $subscribes->email= $request->email;
    $subscribes->save();
    Mail::send(new SubscribeMail($subscribes));
    Alert::success('Thanks for Subscribe')->autoclose(3000);
    return Redirect::back()->with(['subsdata' => $subscribes]); 

     }

  public function smsSubscribe(Request $request){
    $basic  = new \Nexmo\Client\Credentials\Basic('07f7380e', '4IG97c47MYVbKGZ5');
    $client = new \Nexmo\Client($basic);
    $message = $client->message()->send([
    'to' => '917017416287',
    'from' => '917017416287',
    'text' => 'Thanks for subscribes'
    ]);
    return 'Thanks for subscribes';


  }





    public function aboutUs(){

        return view('frontend.about-us');
    }

    public function ourGallery(){

        return view('frontend.gallery');
    }

    public function ourServices(){

        return view('frontend.services');
    }

    public function contactUs(){

        return view('frontend.contact-us');
    }



    public function storeContUs(Request $request){
     
    $messages = [
     'phone.required' => 'Phone Number Must Be 10 Digit!',
    ];
    $validator = Validator::make($request->all(), [
    'name' => 'required',
    'phone' =>'required|min:10',
    // 'email' => 'required|string| email|max:255|unique:clients',
    'email' => 'required|string| email|max:255'
     

    ],$messages);

    if ($validator->fails()) {
    return redirect()->back()
                ->withErrors($validator)
                ->withInput();
    }
       
    

    $contacts = new Contact; 
    $contacts->email= $request->email;
    $contacts->name= $request->name;
    $contacts->phone= $request->phone;
    $contacts->message= $request->message;
    $contacts->save();

    //Alert::success('Good Job!!')->autoclose(3000);   

    return redirect('thankyou')->with('message','Thank You For Contacting Us !!');

    }




    public function ourBlog(){

        return view('frontend.blog');
    }




    public function thankyou(){

        return view('thankyou');
    }









}
