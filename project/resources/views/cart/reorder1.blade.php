@extends('frontend.template')


@section('content')

<style media="screen">
   .inc,.dec{
     width: 28px;
    height: 28px;
    background: linear-gradient(#fff,#f9f9f9);
    display: inline-block;
    border: 1px solid #c2c2c2;
    cursor: pointer;
    font-size: 16px;
    border-radius: 50%;
    padding-top: 1px;
    line-height: 1;
   }
   .qtnt{
     display: inline-block;
padding: 3px 6px;
width: calc(100% - 60px);
height: 100%;
width: 46px;
height: 28px;
border-radius: 2px;
background-color: #fff;
border: 1px solid #c2c2c2;
margin: 0 9px;
   }

.decrement{
    float: left;
    border: 1px;
    width: 30px;
    position: relative;
    left: 0.7em;
    font-size: 35px;
    top: 0.3em;
    cursor: pointer;
   }
.increment{
    font-size: 15px;
    position: relative;
    font-weight: bold;
    cursor: pointer;
    width: 20px;
    top: -2.5em;
    left: 7.4em;
}
.table-content table td input{
    padding: 0px 7px 0 25px;
    margin-top: 1.8em;
    }
 </style>




<!--  @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif -->

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area bg-image--18">
    <div class="ht__bradcaump__wrap d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="bradcaump__inner text-center">
                        <nav class="bradcaump-inner">
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area --> 

<div class="back_button">
  <a href="{{url('/get-restaurant')}}">          
 <button type="button" class="btn">Back To Restaurant</button> 
</a>
</div>

 @if(Cart::getContent()->count() > 0)

<!-- cart-main-area start -->

<div class="cart-main-area section-padding--lg bg--white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 ol-lg-12">
                <form action="#">


<div class="table-responsive">
                    <!--Table-->
                    <table class="table table-striped">
                  
                      <!--Table head-->
                      <thead>
                        <tr>
                                    <th>User</th>
                                     <th>Email</th>
                                     <th>Phone</th>
                                    <!-- <th class="product-thumbnail">Image</th> -->
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                        </tr>
                      </thead>
                      <!--Table head-->
                  
                      <!--Table body-->
                      <tbody>
                                 @foreach($cartdata as $cartdatas)
                                     <?php $pdata =getPoductDetails($cartdatas->id);  ?>

                        <tr>
                        <td><i><b> {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</b></i></td>

                        <td><i><b> {{{ Auth::user()->email }}}</b></i></td>
                        <td><i><b> {{{ Auth::user()->phone }}}</b></i></td>
                                                                                                  
                       <!--  <td class="product-thumbnail"><a><img src="assets/images/cart/2.jpg" alt="product img" /></a></td>
 -->
                                    <td><a><i><b>{{$cartdatas->name}}</b></i></a></td>

                                    <input type="hidden" name="product_id" value="{{$cartdatas->id}}" id="product_id">
                                    <td><span><i><b>Rs.{{$cartdatas->price}}</i></b></span></td>
                                   <!--  <td class="product-quantity"><input type="number" value="{{$cartdatas->quantity}}" /> 
                                    </td> -->

                                    <td class="text-center" >                              
                                    <div class="quinty padding-top-20">           
                                     <div class="cart-info quantity ">
            <div class="btn-increment-decrement decrement custombutton" onClick="decrement_quantity({{$cartdatas->id}})">-</div>
                        <input class="input-quantity "
                            id="input-quantity-{{$cartdatas->id}}" value="{{$cartdatas->quantity}}">
            <div class="btn-increment-decrement increment custombutton"
                                        onClick="increment_quantity({{$cartdatas->id}})">+</div>
                                </div>




                            </div>


                            </td>

                
            <td><i><b>Rs.{{Cart::get($cartdatas->id)->getPriceSum()}}</b></i></td>

            <td>
                <a href="{{url('/checkout-init')}}">
              
             <button type="button" class="btn">Reorder</button> 
            </a>

               <a href="{{url('/paymentcancel')}}">             
              
             <button type="button" class="btn">Cancel</button> 
            </a>
            </td>
                                </tr>

                             @endforeach

                            </tbody>
                        </table>
                    </div>
                </form> 







                

                
              <div class="cartbox__btn">

            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
            <li>  <input style="margin-left:10px;" type="text" id="coupon_entry" value="" />
            <input type="hidden" name="Applied Promotion" id="order_coupon" value="" placeholder="Enter coupon code" />
            <input type="button" value="Apply Code"  class="btn" />
            <p id="coupon_message" style="display:none; font-weight:bold; margin-top:8px;"></p>
            </li>
   <!-- 
            <a href="{{url('/checkout-init')}}">
              
             <button type="button" class="btn">Reorder</button> 
            </a>

               <a href="#">
              
             <button type="button" class="btn">Cancel</button> 
            </a>
 -->

            </ul>
            </div>
            </div>
        </div>
    </div>  
</div>
@else
<section class="food__acconrdion__area bg--white section-padding--lg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section__title title__style--2 service__align--center">
                    <h2 class="title__line">No Items In Cart</h2>
                    <a href="{{url('/')}}">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</section>
  
@endif

    
 

<script type="text/javascript">
  var Coupon = new LiveValidation('Coupon', { validMessage: 'Valid Code', wait: 500});
  Coupon.add(Validate.Format, {pattern: /^mom$/i, failureMessage: "Invalid Code"} );
</script> 



<script>
function increment_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    var newQuantity = parseInt($(inputQuantityElement).val())+1;
    save_to_db(cart_id, newQuantity);
}

function decrement_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    if($(inputQuantityElement).val() > 1) 
    {
    var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
    save_to_db(cart_id, newQuantity);
    }
}

function save_to_db(cart_id, new_quantity) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    $.ajax({
        url : "cart/update-quantity",
        data :{_token: '{{ csrf_token() }}',cart_id:cart_id,new_quantity:new_quantity},
        type : 'post',
        success : function(response) {

           // alert(response);

            $(inputQuantityElement).val(new_quantity);
                  window.location.reload();

        }
    });
}
</script>

@endsection
