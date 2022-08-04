@extends('frontend.template')


@section('content')

@include('sweet::alert')

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
                <form action="#" method="post"> 
                    @csrf              
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr class="title-top">
                                    <th class="product-name">User</th>
                                     <th class="product-name">Email</th>
                                     <th class="product-name">Phone</th>
                                      <th class="product-name">Address</th>
                                        <!-- <th class="product-name">ProfileImage</th> -->
                                    <!-- <th class="product-thumbnail">Image</th> -->
                                
                                </tr>
                            </thead>
                            <tbody>
                            		 @foreach($cartdata as $cartdatas)
                                     <?php $pdata =getPoductDetails($cartdatas->id);  ?>

                        <tr>
                        <td><i><b> {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</b></i></td>
                        <td><i><b> {{{ Auth::user()->email }}}</b></i></td>
                        <td><i><b> {{{ Auth::user()->phone }}}</b></i></td>
                                                                                                  
                       <!--  <td class="product-thumbnail"><a><img src="assets/images/cart/2.jpg" alt="product img" /></a></td>
                         -->
                         <td><a><i><b>{{{ Auth::user()->full_address }}}</b></i></a></td>
                        <!--    <td><a><i><b>{{{ Auth::user()->avatar}}}</b></i></a></td> -->

                        <input type="hidden" name="product_id" value="{{$cartdatas->id}}" id="product_id">
                        </tr>

							 @endforeach

                            </tbody>
                        </table>
                    </div>
                </form> 
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

    
 



@endsection
