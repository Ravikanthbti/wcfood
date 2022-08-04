<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;
use App\User;
use Validator;
use Response;

class CartController extends Controller
{




  public function addToCart(Request $request ){

    // $this->validate($request->all(), [
    //      'quantity' => 'required',
    //  ]);
   
      // print_r($request->all());
      // die;

    $cart = Cart::add([
    'id'=>$request->product_id,
    'name'=>$request->product_name,
    'price'=>$request->product_price,
    'quantity'=>$request->product_quantity,
    ]);

   if($cart){
       session()->flash('message', 'Item Added Successfully to Your Cart.');
       Session::flash('type', 'success');
       Session::flash('title', 'Success');
       return redirect ('cart');
     }
     else{

       return redirect()->back()->with('notificationText', 'No Items!');

     }

  }


   public function viewCart(){

    $cartdata = Cart::getContent();

    return view('cart.cart',['cartdata'=>$cartdata])->with('message', ' Item  Added to  your Cart !');


   }




    public function deleteItem($id)
    {

    Cart::remove($id);
   
    return redirect()->back()->with('message', ' Item Remove Successfully!!!');

    }


     public function updateQuantity(Request $request){

      Cart::update($request->cart_id, array(
        'quantity' => array(
      'relative' => false,
      'value' => $request->new_quantity
        )
    
      ));
  
     
     return Response::json(['success'=>true]);
    }

   



     public function checkout(){
      $data['cartdata'] = Cart::getContent();
      echo"<pre>";
      
      print_r($data['cartdata']);
      exit();
      return view('cart.checkout',$data);
    }


     public function deliveryAddress(Request $request){
      $request->session()->put('delivery_address', $request->all()); 
      return redirect('checkout-init');
     }
    

      public function reOrder(){
      $data['cartdata'] = Cart::getContent();
      return view('cart.reorder',$data);
     }


     public function myProfile(){
      $data['cartdata'] = Cart::getContent();

      return view('cart.myprofile',$data);
     }

    
    //CART CLEAR AND AUTH USER CLEAR
     
      public function clearCart(){
      $data['cartdata'] = Cart::getContent();
      $userId = auth()->user()->id;
      Cart::clear();
      Cart::session($userId)->clear();
      echo "<pre>";
      print_r($data);
      echo "</pre>";
      die;
      return redirect('/');
    
        }




}
