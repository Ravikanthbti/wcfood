@extends('frontend.template')

@section('content')


<!-- @if(Session::has('message'))
<div id="alerts">
    <div class="alert alert-dismissable alert-{{ Session::get('alert-class', 'success') }}">{{ Session::get('message') }}
        <button class="close" role="close" data-dismiss="alert">&times;</button>
    </div>
</div>
@endif -->



  <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--18">
            <div class="ht__bradcaump__wrap d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="bradcaump__inner text-center">
                                <!-- <h2 class="bradcaump-title">Checkout</h2> -->
                                <!-- nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                                  <span class="breadcrumb-item active">Checkout</span>
                                </nav> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area --> 
         <section class="htc__checkout bg--white section-padding--lg">
            <!-- Checkout Section Start-->
            <div class="checkout-section">
                <div class="container">
                    <div class="row">
                       
                        <div class="col-lg-6 col-12 mb-30">
                               
                                <!-- Checkout Accordion Start -->
                                <div id="checkout-accordion">
                                   
                                    <!-- Checkout Method -->
                                    @if(!Auth::check())
                                    <div class="single-accordion">
                                        <a class="accordion-head" data-toggle="collapse" data-parent="#checkout-accordion" href="#checkout-method">1. checkout method</a>
                                        
                                        

                                        <div id="checkout-method" class="collapse show">
                                            <div class="checkout-method accordion-body fix">
                                               
                                                <ul class="checkout-method-list">
                                               	<li class="active" data-form="checkout-login-form">Login</li>
                                                    <li data-form="checkout-register-form">Register</li>
                                              </ul>
                                                

 												
                                                <form action="{{ route('login') }}" class="checkout-login-form" method="post">
                                                	@csrf

                                                    <div class="row">

                                                        <div class="input-box col-md-6 col-12 mb--20">

                                                        	<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                        	@error('email')
							                                    <span class="invalid-feedback" role="alert">
							                                        <strong>{{ $message }}</strong>
							                                    </span>
							                                @enderror


                                                        </div>

                                                        <div class="input-box col-md-6 col-12 mb--20">

                                                        	<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                        	@error('password')
							                                    <span class="invalid-feedback" role="alert">
							                                        <strong>{{ $message }}</strong>
							                                    </span>
							                                @enderror

                                                        </div>

                                                        <div class="input-box col-12">
                                                        	<input type="submit" value="Login">
                                                        </div>
                                                    </div>
                                                </form>



                                                 
                                        <form action="{{ route('register') }}" class="checkout-register-form" method="post">
                                                	@csrf
                                                    <div class="row">
                                                        <div class="input-box col-md-6 col-12 mb--20"><input type="text" placeholder="Your Name" onkeypress="return (event.charCode > 
                                                64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" maxlength="35" required=""></div>



                                                        <div class="input-box col-md-6 col-12 mb--20"><input type="email" placeholder="Email Address" value="{{old('email')}}" required="">

                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror


                                                        </div>


                                                        <div class="input-box col-md-6 col-12 mb--20"><input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">

                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror

                                                        </div>


                                                        <div class="input-box col-md-6 col-12 mb--20"><input type="password" placeholder="Confirm Password"></div>



                                                        <div class="input-box col-12"><input type="submit" value="Register"></div>
                                                    </div>
                                                </form> 
                                            </div>
                                        </div>
                                    </div>

                                        <div class="single-accordion">
                                        <p class="accordion-head collapsed">Delivery Address</p>
                                    </div>
                                        <div class="single-accordion">
                                    <p class="accordion-head collapsed">Payment</p>
                                </div>

                                     @else
                                       
                                       <div class="single-accordion">
                                       	   <p class="accordion-head collapsed">Logged in : {{Auth::user()->name}}</p>
                                       </div>
                                        
                                         <!-- Billing Method -->
                                    <div class="single-accordion">
                                    	
                                    
                                         <a class="accordion-head collapsed">Add a delivery Address</a>
                                         <div id="billing-method">
                                       
                                            

                                           
                                            <div class="accordion-body billing-method fix">

                                               @if(Auth::user()->full_address == NULL)
                                                <form action="{{url('add/delivery-address')}}" class="billing-form checkout-form" method="post">
                                                    <div class="row">
                                                      @csrf
                                                       
                                                        <div class="col-12 mb--20">
                                                            <input placeholder="Street address" type="text" name="full_address"  value="{{ Auth::user()->full_address }}">

                                                        @if ($errors->has('full_address'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('full_address') }}</strong>
                                                        </span>
`                                                         @endif

                                                        </div>
                                                        <div class="col-12 mb--20">
                                                            <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name="street">
                                                        </div>
                                                        <div class="col-12 mb--20">
                                                            <input placeholder="Town / City" type="text" name="city">
                                                        </div>
                                                        <div class="col-md-6 col-12 mb--20">                                 
                                                            <input type="text" placeholder="State / County" name="state">
                                                        </div>
                                                        <div class="col-md-6 col-12 mb--20">                                 
                                                            <input placeholder="Postcode / Zip" type="text" name="postcode">
                                                        </div>

                                                        <div class="input-box col-12">
                                                        	<input type="submit" value="Save">
                                                        </div>
                                                                              
                                                    </div>
                                                </form>
                                                @else
                                             

                                                <p>{{ Auth::user()->name }} </p>
                                                <p>{{ Auth::user()->email }}, {{ Auth::user()->phone }}</p>
									            <p>{{ Auth::user()->full_address }} </p>
									            <p>{{ Auth::user()->street }} </p>
									            <p>{{ Auth::user()->city }} </p>
									            <p>{{ Auth::user()->state }} {{ Auth::user()->postcode }}</p>
									            <button class="change_address" id='change_address'>Change</button>
									            
						              <form method="POST" action="{{ url('update/delivery-address') }}" id="update_address">
                        							@csrf

                                        <div class="form-group ">
                                        <label for="name" class=" text-md-right">{{ __('Name') }}</label>


                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required onkeypress="return (event.charCode > 
                                                64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" 

                                               maxlength="35"     >




                                 

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                              @endif

                        </div>
     
                        <div class="form-group">
                            <label for="phone-number" class=" col-form-label text-md-right">{{ __('Phone Number') }}</label>


                            <input id="phone-number" type="tel" class="form-control" name="phone" value="{{ Auth::user()->phone }}" onkeypress="return isNumberKey(event)" maxlength="10" required>
                           
                            @if ($errors->has('phone')) 
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="address" class=" col-form-label text-md-right">{{ __('full address') }}</label>


                            <input id="address" type="text" class="form-control" name="full_address" value="{{ Auth::user()->full_address }}" required>
                            @if ($errors->has('full_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('full_address') }}</strong>
                                    </span>
                                @endif
                        </div>

                         <div class="form-group">
                            <label for="street" class=" col-form-label text-md-right">{{ __('street') }}</label>


                            <input id="street" type="text" class="form-control" name="street" value="{{ Auth::user()->street }}" required>
                                @if ($errors->has('street'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="city" class=" col-form-label text-md-right">{{ __('City') }}</label>


                            <input id="city" type="text" class="form-control" name="city" value="{{ Auth::user()->city }}" required>
                            @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="state" class=" col-form-label text-md-right">{{ __('State') }}</label>


                            <input id="state" type="text" class="form-control" name="state" value="{{ Auth::user()->state }}" required>
                            @if ($errors->has('state'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="pincode" class=" col-form-label text-md-right">{{ __('Pincode') }}</label>


                            <input id="postcode" type="text" class="form-control" name="postcode" value="{{ Auth::user()->postcode }}" required>
                            @if ($errors->has('postcode'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-round">
                                    {{ __('SAVE AND DELIVER HERE') }}
                                </button>
                                <button class="cancel_update" id="cancel_update">CANCEL</button>
                            </div>
                        </div>
                        </form>

                        @endif
                                                
                        <div>
                    </div>
                </div>
                                    

                                    
               
                <!-- Payment Method -->
                <div class="single-accordion">
                    <a class="accordion-head collapsed">Payment method</a>
                    @if(Auth::user()->full_address != NULL)
                   <div id="payment-method">
                            <div class="accordion-body payment-method fix">
                            <form action="{{url('payment-init')}}" class="payment-method-list" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                <div class="col-sm-3 ">

                                <input name="payment_option" value="COD" type="radio"  required/> COD
             
                                 </div>
                               <div class="col-sm-3">
           
                                <input name="payment_option" value="Pay" type="radio"  /> Pay Online
             
                                 </div>
                             </div>
                               
                                 <div class="input-box col-12">
                                        <input type="submit" value="Place Order">
                                  </div>
                              
                             </form> 
                           
                        </div>
                    </div>
                     @endif
                </div>
                 @endif

            </div>
        </div>




<!--payment method end-->

  <!-- @foreach($cartdata as $cartdatas) -->

<!-- !-- Order Details -->
<!-- <div class="col-lg-6 col-12 mb-30">
    <div class="order-details-wrapper">
        <h2>your order</h2>
        <div class="order-details">
            <form action="#">
                <ul>
                   <li><p class="strong">product</p><p class="strong">total</p></li>

                    <li><p>{{$cartdatas->name}}:Rs.{{$cartdatas->price}}x{{$cartdatas->quantity}}</p><p>
                    	Rs.{{Cart::get($cartdatas->id)->getPriceSum()}}</p></li>

                    <li><p class="strong">cart subtotal</p><p class="strong">Rs.{{Cart::get($cartdatas->id)->getPriceSum()}}</p></li>

                    <li><p class="strong">shipping</p>

                    	<p>
                        <input type="radio" name="order-shipping" id="flat" />
                        <label for="flat">Flat Rate $ 7.00</label><br />

                        <input type="radio" name="order-shipping" id="free" />
                        <label for="free">Free Shipping</label>   
                    </p>
                </li>
                    <li><p class="strong">order total</p><p class="strong">$190.98</p></li>
                    <li><button class="food__btn">place order</button></li>
                </ul>
            </form>
        </div>
        </div>
    </div> 
    @endforeach  
        </div> -->
    </div>
    </div> 
    </div>
</div>
</section>

  
          
        <!-- Checkout Section End-->   

<script>

    $('#update_address').hide();
   $('#change_address').click(function(){
      $('#update_address').toggle();
   });
   $('#cancel_update').click(function(){
      $('#update_address').hide();
   });
   
</script>        

<script type="text/javascript">
    
 function isNumberKey(evt)
  {
     var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

     return true;
  }
</script>



@endsection