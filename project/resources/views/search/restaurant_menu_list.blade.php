@extends('frontend.template')

@section('content')
   

 <!-- Start Bradcaump area -->
      <div class="detail_slider">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3">

                 <img src="../assets/images/beef/1.jpg" class="img-responsive food_img"> 

                </div>
                <div class="col-md-6">
                 <h3>{{$restaurant->name}}</h3>
                 <p>{{$restaurant->full_address}}</p>
                <!--  <p>South Indian, North Indian</p> -->

                 <div class="row rating">
                     <div class="col=md-3 first_rate">
                       <h4>4.0</h4> 
                       <p class="rating_p">1000+ Ratings</p> 
                     </div>

                     <div class="col=md-3 second_rate">
                         <h4>29 mins</h4> 
                         <p class="rating_p">Delivery Time</p> 
                     </div>


                      <div class="col=md-3 second_rate">
                         <h4> {{$restaurant->opening_time}} am </h4> 
                         <p class="rating_p">Opeing Time</p> 
                     </div>

                     <div class="col=md-3 third_rate">
                         <h4>{{$restaurant->ending_time}} pm</h4> 
                         <p class="rating_p">Closing Time</p> 
                     </div>
                 </div>
                </div>
                <div class="col-md-3">
                  <div class="Z4sK8">
                    <div class="_2FyFZ icJ_O">
                        <div class="QWCzK">Offer</div>
                        <div class="_3F2Nk">
                            <div class="DM5zR">
                                <span class="icon-offer-filled _26GkL"></span>
                                <div class="_3lvLZ">30% off on orders above ₹99 up to ₹75 | Use coupon</div>
                            </div>
                                <div class="DM5zR">
                                    <span class="icon-multi-offer _26GkL _22s66"></span>
                                    <div class="_3lvLZ">Free Apple Drink on orders above ₹99 for SUPERs
                                    </div>
                                </div>
                                
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>

                   
         
                
            
            <div class="row">
            <div class="_2e0fx">
                <div class="LrkrN">
                    <div class="_1g_1a">



                        <!--Searching Area Start-->
                        <div class="col-md-6"><i class="icon-magnifier"></i>   
                        <div class="_3d2Yn ">
                            <i class="fa fa-search search_icon" aria-hidden="true"></i><span class="_2QyU3 icon-magnifier"></span>

                               <span class="_1JjHr">
                              <!--   <input class="_5mXmk" type="text" placeholder="Search for dishes..." value="">
                              -->
                              <form action="{{url('/search')}}" method="get" enctype="multipart/form-data">
                               <input type="text" placeholder="Search product  here..." name="query" id="search" value="{{request()->input('query')}}"  class="_5mXmk"  >
                              </form>
                               </span>  

                                <span class="_38kfh icon-close-thin"></span>
                            </div>
                        </div>
                      <!--Searching Area End-->







                     <div class="col-md-3">
                        <label>
                            <div class="_31C1x _2C8Ic">
                                <i class="fa fa-leaf fa_leaf" aria-hidden="true"></i><span class="_3qd9q icon-leaf"></span>
                                <span class="_1KYwd">Pure Veg</span>
                            </div>
                        </label>
                    </div>
                      <div class="col-md-3">
                        <div class="_2Epw9 ">
                          <span class="_2JnGH icon-heartInverse"> <i class="fa fa-heart-o fa_heart"></i> 
                                <div class="TQcBQ icon-heart zSo2a" style="display: none;">
                                    
                                </div>
                            </span>
                            <span class="_2FDKw">Favourite</span>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- End Bradcaump area --> 


        <!-- Start Blog List View Area -->
        <section class="blog__list__view section-padding--lg menudetails-right-sidebar bg--white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 detail_leftside">

                      <!-- Start Category Area -->
                            <div class="food__category__area mt--60">
                                <h4 class="side__title">Categories</h4>
                                <ul class="food__category">
                                    <li><a href="#">Maxican Food <span>(20)</span></a></li>
                                    <li><a href="#">Pizza <span>(30)</span></a></li>
                                    <li><a href="#">Food & Beverage <span>(40)</span></a></li>
                                    <li><a href="#">Maxican Food <span>(50)</span></a></li>
                                    <li><a href="#">Asian Twist <span>(60)</span></a></li>
                                    <li><a href="#">Taco Food <span>(20)</span></a></li>
                                </ul>
                            </div>
                        <!-- End Category Area -->






    <!-- Start Filter Area -->
    <div id="price_filter-5" class="widget widget_price_filter">
        <h3 class="widget-title">Filter by price</h3>
        <form method="get" action="#">
            <div class="price_slider_wrapper">
                <div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" style="">
                    <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;">
                    </div>
                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span>
                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"></span>
                </div>
                <div class="price_slider_amount">
                    <input type="text" id="min_price" name="min_price" value="" data-min="13" placeholder="Min price" style="display: none;">
                    <input type="text" id="max_price" name="max_price" value="" data-max="1300" placeholder="Max price" style="display: none;">
                    <button type="submit" class="button">Filter</button>
                    <div class="price_label" style="">
                        Price: <span class="from">$13</span> — <span class="to">$1300</span>
                    </div>
                    
                    <div class="clear"></div>
                </div>
            </div>
        </form>
    </div>
    <!-- End Filter Area -->
    

                </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="popupal__menu">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row mt--30">


                            <!-- Start Single Product -->
                           @if(count($restaurantmenu) ==0)

                           <h2 style="margin:auto;">No data found</h2>
                           @else
 
                            @foreach($restaurantmenu as $menu)
                                
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="beef_product">
                                    <div class="beef__thumb">
                                        <a>
                                            <img src="../assets/images/beef/1.jpg" alt="beef images">
                                        </a>
                                    </div>
                                    <div class="beef__hover__info">
                                        <div class="beef__hover__inner">
                                            <span>Special</span>
                                            <span>offer</span>
                                        </div>
                                    </div>
                                    <div class="beef__details">
                                        <h4><i>{{$menu->menu_name}}</i></h4>
                                        <p>Top Item</p>
                                        <ul class="beef__prize">
                                            <li class="old__prize"></li>
                                            <li>Rs.{{ $menu->price }}</li>
                                          

                                            <form action="{{url('addTocart')}}" method="post" enctype="multipart/form-data" id="cart_form" class="cart_form" name="cart_form">
                                                @csrf
                                              <input type="hidden" name="restaurant_id" value="{{$menu->restaurant_id}}">
                                               <input type="hidden" name="product_id" value="{{$menu->menu_id}}">
                                               <input type="hidden" name="product_name" value="{{$menu->menu_name}}">
                                               <input type="hidden" name="product_price" value="{{$menu->price}}">
                                               <input type="hidden" name="product_quantity" value="1">
                                              <input type="submit" name="submit" value="ADD" class="add_btn _1RPOp">

                                           </form>

                                        </ul>
                                    </div>
                                </div>
                             </div>
                        
                            @endforeach
                           @endif

                        </div> 
                    </div>

                     <!-- End Single Product -->





                    <div class="col-lg-3 col-md-12 col-sm-12 md--mt--40 sm--mt--40 detail_rightside">
                       


                          <!-- Start Sidebar Contact -->
                          <div class="sidebar__contact mt--60">
                              <div class="sidebar__thumb">
                                  <img src="../assets/images/blog/sidebar/2.jpg" alt="sidebar images">
                              </div>
                              <div class="sidebar__details">
                                  <h4>colorful</h4>
                                  <h2>donut’s</h2>
                                  <span>get it till the stock full</span>
                              </div>
                              <div class="sidebar__con__btn">
                                  <a href="#">Contact Now<i class="fa fa-long-arrow-right"></i></a>
                              </div>
                          </div>
                          <!-- End Sidebar Contact -->

                          <!-- Start Sidebar Newsletter -->
                          <div class="sidebar__newsletter mt--60" style="display: none;">
                              <h4 class="side__title">Newsletter</h4>
                              <div class="sidebar__inbox">
                                  <input type="text" placeholder="Enter your E-mail">
                                  <a href="#"><i class="fa fa-paper-plane"></i></a>
                              </div>
                          </div>
                          <!-- End Sidebar Newsletter -->

                          <!-- Start Sidebar Instagram -->
                          <div class="sidebar__instagram mt--60" style="display: none;">
                              <h4 class="side__title">Instagram</h4>
                              <ul class="instagram__list d-flex flex-wrap">
                                  <li><a href="#"><img src="../assets/images/blog/instagram/1.jpg" alt="instagram images"></a></li>
                                  <li><a href="#"><img src="../assets/images/blog/instagram/2.jpg" alt="instagram images"></a></li>
                                  <li><a href="#"><img src="../assets/images/blog/instagram/3.jpg" alt="instagram images"></a></li>
                                  <li><a href="#"><img src="../assets/images/blog/instagram/4.jpg" alt="instagram images"></a></li>
                                  <li><a href="#"><img src="../assets/images/blog/instagram/5.jpg" alt="instagram images"></a></li>
                                  <li><a href="#"><img src="../assets/images/blog/instagram/6.jpg" alt="instagram images"></a></li>
                              </ul>
                          </div>
                          <!-- End Sidebar Instagram -->

                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- End Blog List View Area -->






@endsection