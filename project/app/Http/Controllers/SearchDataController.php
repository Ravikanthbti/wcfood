<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\RestaurantMenu;
use App\MenuItem;
use App\User;
use DB;
use Cookie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SearchDataController extends Controller
{
    
    public function create()
    {
     return view('search.create');
    }



    public function searchRestaurants(Request $request)
    {
   
        $lifetime = time() + 60 * 60 * 24 * 365;

        $data = new \App\Restaurant();

        $address=$request->get('full_address');

        $url = "https://maps.google.com/maps/api/geocode/json?key=AIzaSyDto4d4DM5gzo5uIDF9Mr4DS36V_hlHkK4&address=".urlencode($address);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
        $responseJson = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($responseJson);

        if ($response->status == 'OK') {
        $latitude = $response->results[0]->geometry->location->lat;
        $longitude = $response->results[0]->geometry->location->lng;



        } 
        else {
        echo $response->status;
        var_dump($response);
        }


        // echo 'Latitude: ' . $latitude;
        // echo '<br />';
        // echo 'Longitude: ' . $longitude;
        // die();

        $cookielat = Cookie::queue('latitude', $latitude, $lifetime);
        $cookielong = Cookie::queue('longitude', $longitude, $lifetime);

    

        return redirect('get-restaurant');
 
 }



        
        public function getRestaurant()
        {  

         // $data['restaurants']=Restaurant::all();
            $latitude =Cookie::get('latitude');
            $longitude =Cookie::get('longitude');
            
           $data['restaurants'] = DB::select(' select * from restaurants where restaurent_lat BETWEEN ("'.$latitude.'" - (1*0.018)) AND ("'.$latitude.'"+ (1*0.018)) AND  restaurent_lang BETWEEN ("'.$longitude.'" - (1*0.018)) AND ("'.$longitude.'" + (1*0.018))'); 
              return view('search.restaurantList',$data);
        
        }
              


        public function viewRestaurant($slug)
        {

         $slug1 = str_replace('-',' ', $slug);


        // print_r($slug1);

         $data=Restaurant::where('name','like',"%$slug1%")->first();

            $resId = $data['restaurant_id'];
          // print_r($data['restaurant_id']);
          // $data['rest']=$data;
         
         $data['restaurantmenu'] =MenuItem::join('restaurant_menus', 'menu_items.menu_id', '=', 'restaurant_menus.id')
             ->join('restaurants','restaurant_menus.restaurant_id','=','restaurants.restaurant_id')
            ->select('restaurant_menus.menu_name','menu_items.price','menu_items.item_name','restaurants.*','menu_items.menu_id')
            ->where('restaurants.restaurant_id',$resId)
            ->get();

         $data['restaurant'] = Restaurant::find($resId);
            
        return view('search.restaurant_menu_list',$data);
        }







       public function seachItem(Request $request){



        $request->validate([
               'query'=>'required|min:3',    
        ]);
        
        $query = $request->input('query');
        

        $data['rests']=RestaurantMenu::where('menu_name','like',"%$query%")
                                  ->orWhere('id','like',"%$query%")
                                 ->paginate(5);
                                
                 

        return view('search.search-result',$data);

        }

   



    //For Testing purpose

     public function autocomplete(Request $request)
    {

        $req = $request->input('query');
      
        $data = User::select("name")
                ->where("name","LIKE","%{$req}%")
                ->get();
 

      // $data = RestaurantMenu::select("menu_name")
      //           ->where("menu_name","LIKE","%{$req}%")
      //           ->get();      
   
        return response()->json($data);
    }


      public function restoMenuSearch()
      {
          return view('search.restomenusearch');
      }







     





}