@extends('frontend.template')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@section('content')

 <!-- Start Bradcaump area -->
      <div class="detail_slider">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3">

                 <img src="../assets/images/beef/1.jpg" class="img-responsive food_img"> 

                </div>
                <div class="col-md-6">
                 <h3>Testrestaurant</h3>
                 <p>noida</p>
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
                         <h4> 9 am </h4> 
                         <p class="rating_p">Opeing Time</p> 
                     </div>

                     <div class="col=md-3 third_rate">
                         <h4>9 pm</h4> 
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
                        <div></i>   
                        <div>
                           

                            
            <!--   <input class="_5mXmk form-control" type="text" placeholder="Search for dishes..." value="" name="search" id="search"> -->
                             
        <div>

      <input type="text" name="search" id="search" class="form-control _5mXmk" placeholder="Search here..." style="width: 40%" />
     </div>

                             
                
                
                            </div>
                        </div>
                      <!--Searching Area End-->





  <div class="container box">

   <h3 align="center">Live Search.. </h3><br/>

   <div class="panel panel-default">

    <div class="panel-heading">Search Customer Information </div>

    <div class="panel-body">

     <div class="form-group">

      <input type="text" name="search" id="search" class="form-control" placeholder="Search here..." style="width: 50%" />
     </div>


          <div class="table-responsive">
            <h3 align="center">Total Data:<span id="total_records"></span></h3>

            <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                         <th>ItemName</th>
                        </tr>
                     </thead>

                   <tbody>
                  <tr>
                
            
                  </tr>
                 </tbody>
               </table>

             </div>

            </div>    
          </div>
      </div>
@endsection

<script>
$(document).ready(function(){
 
 fetch_customer_data();
 
 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }
 
 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>

