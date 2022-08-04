<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Validator;
use Notification;
use Session;

class ADashboardController extends Controller
{
    public function __construct(){
       
       $this->middleware('auth:admin');
    }


    public function index(){
        
       $data['page_title']='Admin Dashboard';
       
       return view ('admin_dashboard.index',$data);
       
    }

  
     
          
     
}       
            
        

        
