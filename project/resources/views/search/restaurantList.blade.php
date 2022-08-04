@extends('frontend.template')

@section('content')
<!-- Start Menu Grid Area -->
        <section class="food__menu__grid__area section-padding--lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="grid__show d-flex justify-content-between align-items-center">
                            <div class="grid__show__item">
                                <p>Showing 1-9 of 18 Result </p>
                            </div>
                            <div class="grid__show__btn">
                                <a class="food__btn" href="{{url('/get-restaurant')}}">Restaurants List Under 10 km</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt--30">

             

                	@foreach($restaurants as $res) 

                      <tr>
                    <!-- Start Single Menu Item -->
                    <div class="col-lg-4 col-sm-12 col-md-6">
                        <div class="menu__grid__item wow fadeInLeft">
                            <div class="menu__grid__thumb">
                                <a href="{{ url('view-restaurant/'.str_slug($res->name))}}">
                                    <img src="assets/images/menu-grid/1.jpg" alt="grid item images">
                                </a>
                                <div class="grid__item__offer">
                                    <span>Special</span>
                                    <span>Offer</span>
                                </div>
                            </div>
                            <div class="menu__grid__inner">
                                <div class="menu__grid__details">
                                    <h2><a href="{{ url('view-restaurant/'.str_slug($res->name))}}">{{ $res->name }}</a></h2>
                                    <ul class="grid__prize__list">
                                      <td>  <li class="old__prize"></td></li>
                                        <li><p>Price Range:</p>{{ $res->price_range }}</li> 
                                    </ul>
                                    <p>erve armesan may be added to the top of apLem ip, consectetur adipisicing elLorem ipsum adipisicing elit, sed do</p>
                                </div>
                            </div>
                        	</div>
                    	</div>
                    </tr>
                     @endforeach
             </section>
        <!-- End Menu Grid Area -->
@endsection