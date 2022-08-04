@extends('admin_dashboard.dashboard')
@section('style')

    <link href="{{ asset('assets/admin/css/bootstrap-toggle.min.css') }}" rel="stylesheet">
    <style>
        .controls {
        background-color: #fff;
        border-radius: 2px;
        border: 1px solid transparent;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        height: 29px;
        margin-left: 17px;
        margin-top: 10px;
        outline: none;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      .controls:focus {
        border-color: #4d90fe;
      }
      .title {
        font-weight: bold;
      }
      #infowindow-content {
        display: none;
      }
      #map #infowindow-content {
        display: inline;
      }
    </style>
@endsection
@section('content')
<script type="text/javascript">
  
  function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }


</script>



<div class="row">
    <div class="col-md-12">

        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <strong class="uppercase"><i class="fa fa-info-circle"></i> {{ $page_title }}</strong>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                </div>
            </div>
            <div class="portlet-body" style="overflow: hidden">

   	<form method="post" id="add_restaurent_form_id" action=" {{ url('admin/update-restaurant/'.$restaurant->restaurant_id) }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">


                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-md-4" >
                                            <label class="control-label control_name">Restaurant Name:</label>
                                        </div>
                                        <div class="col-md-4">
        <input type="text" id="required2" name="name" class="form-control" required value="{{$restaurant->name}}" onkeypress="return (event.charCode > 
                                            64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" maxlength="35"   />

                                              @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-12">

                                <div class="form-row">
                                    <div class="form-group col-md-4" >
                                        <label for="opening_time" style="float: right;color: #468847;font-weight: bold;">Opening_Time:</label>
                                    </div> 
                                    <div class="form-group col-md-4" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="opening_hour" class="form-control" style="border-color: #468847;">
                                                    <?php
                                                    for ($i = 1; $i <= 23; $i++) {
                                                        if ($i < 10) {
                                                            $min = 0;
                                                            $hours = $min . $i;
                                                        } else {
                                                            $hours = $i;
                                                        }
                                                        ?>
                                                        <option value="<?php echo $hours; ?>" >
                                                        <?php echo $hours; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>


                                                </select>
                                                  @error('opening_hour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <select name="opening_minutes" class="form-control" style="border-color: #468847;">
                        <?php
                        for ($i = 0; $i <= 59; $i++) {
                            if ($i < 10) {
                                $min = 0;
                                $minutes = $min . $i;
                            } else {
                                $minutes = $i;
                            }
                            ?>
                                                        <option value="<?php echo $minutes; ?>">
                                                        <?php echo $minutes; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>

                                                </select>
                                                  @error('opening_minutes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12">

                        <div class="form-row">
                            <div class="form-group col-md-4" >
                                <label for="ending_time" style="float: right;color: #468847;font-weight: bold;">Ending_Time:</label>
                            </div> 
                            <div class="form-group col-md-4" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="ending_hour" class="form-control" style="border-color: #468847;">
                <?php
                for ($i = 1; $i <= 23; $i++) {
                    if ($i < 10) {
                        $min = 0;
                        $hours = $min . $i;
                    } else {
                        $hours = $i;
                    }
                    ?>
                                                <option value="<?php echo $hours; ?>">
                                                <?php echo $hours; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>


                                        </select>
                                          @error('ending_hour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <select name="ending_minutes" class="form-control" style="border-color: #468847;">
                                            <?php
                                            for ($i = 0; $i <= 59; $i++) {
                                                if ($i < 10) {
                                                    $min = 0;
                                                    $minutes = $min . $i;
                                                } else {
                                                    $minutes = $i;
                                                }
                                                ?>
                                                <option value="<?php echo $minutes; ?>">
                                                <?php echo $minutes; ?>
                                                </option>
                    <?php
                }
                ?>

                                        </select>
                                          @error('ending_minutes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            
        <div class="col-md-12">
        <div class="form-group">
                <div class="form-group col-md-4" >
                    <label class="control-label control_name">Category:</label>
                </div> 
                <div class="col-md-4">
                    <select  name="category" id="category" class="form-control">

                        @foreach($categories as $category)
                        
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach

                      </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <!-- <input type="text" id="required2" name="category" class="form-control" required /> -->

                </div>
            </div>
        </div> 
    </div>
        <div class="col-md-12">
            <div class="form-group">
                <div class="row">
                    <div class="form-group col-md-4" >
                        <label class="control-label control_name">Price Range:</label>
                    </div> 
                    <div class="col-md-4">
                        <input type="text" id="required2" name="price_range" class="form-control" required  value="{{$restaurant->price_range}}"/>
                        @error('price_range')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
                            <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <div class="form-group col-md-4" >
                    <label class="control-label control_name">Email (For restaurant login): <span style="color: red;font-size: 20px;">*</span></label>
                </div>
                <div class="col-md-4">
                    <input type="email" id="required2" name="email" class="form-control" required   value="{{$restaurant->email}}"/>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <div class="form-group col-md-4" >
                    <label class="control-label control_name">Password: <span style="color: red;font-size: 20px;">*</span></label>
                </div>
                <div class="col-md-4">
                    <input type="password" id="required2" name="password" class="form-control" required  value="{{$restaurant->password}}"/>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>
    </div>
 
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <div class="form-group col-md-4" >
                    <label class="control-label control_name">Description:</label>
                </div> 
                <div class="col-md-4">
                    <input type="text" id="required2" name="descriptions" class="form-control" required  value="{{$restaurant->descriptions}}"/>
                        @error('descriptions')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <div class="form-group col-md-4" >
                    <label class="control-label control_name">Contact Person Name:</label>
                </div>
                <div class="col-md-4">
                    <input type="text" id="required2" name="cont_p_name" class="form-control" required   value="{{$restaurant->cont_p_name}}" onkeypress="return (event.charCode > 
    64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" maxlength="35" />
                        @error('cont_p_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <div class="form-group col-md-4" >
                    <label class="control-label control_name">Contact Person Email:</label>
                </div>
                <div class="col-md-4">
                    <input type="email" id="required2" name="cont_P_email" class="form-control" value="{{$restaurant->cont_p_email}}" required />
                    
                        @error('cont_P_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <div class="form-group col-md-4" >
                    <label class="control-label control_name">Contact Person Phone:</label>
                </div>
                <div class="col-md-4">

        <input type="tel" id="required2" name="cont_p_phone" class="form-control" required  value="{{$restaurant->cont_P_phone}}"  onkeypress="return isNumberKey(event)" maxlength="10" required >

                        @error('cont_p_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <div class="form-group col-md-4" >
                    <label class="control-label control_name">Minimum Order Price:</label>
                </div>
                <div class="col-md-4">
                    <input type="number" id="required2" name="min_order_price" class="form-control" required value="{{$restaurant->min_order_price}}" />
                        @error('min_order_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>
    </div>
  
   <div class="col-md-12">
    <div class="form-group">
    <div class="col-lg-2"></div>
        <div class="col-lg-12">
        <label class="control-label col-lg-4">Postal Code</label>
        <input type="text" id="searchInput" class="controls" placeholder="Enter a Postal Code" value="{{$restaurant->full_address}}" required/>
        <div id="map" style="width:80%;height:350px;"></div>
           <div id="geoData">
              <input type="hidden" name="full_address" id="location" value="{{$restaurant->full_address}}">
              <input type="hidden" name="postalcode" id="postal_code" value="{{$restaurant->postalcode}}">
              <input type="hidden" name="country" id="country" value="{{$restaurant->country}}">
              <input type="hidden" name="latitude" id="lat" value="{{$restaurant->latitude}}">
              <input type="hidden" name="longitude" id="lon" value="{{$restaurant->longitude}}">
            </div> 
        </div>
    </div>
   </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="row">
                <div class="form-group col-md-4" >
                    <label class="control-label control_name">Restaurant Image</label>

                </div>

                <div class="col-lg-8">
                    <div class="fileupload fileupload-new" data-provides="fileupload">


                        <input type="file"  name="resturant_logo" id="image" required onchange="document.getElementById('imgpreview').src = window.URL.createObjectURL(this.files[0])" value="{{$restaurant->resturant_logo}}"/>
                        <img id="imgpreview"  />
                        @error('resturant_logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
    </div>
                            
             
                            

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> Add Restaurant</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


 <script>
   function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 28.443590, lng: 77.533073},
      zoom: 13
    });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
      
        //Location details
        for (var i = 0; i < place.address_components.length; i++) {
            if(place.address_components[i].types[0] == 'postal_code'){
                document.getElementById('postal_code').value = place.address_components[i].long_name;
            }
            if(place.address_components[i].types[0] == 'country'){
                document.getElementById('country').value = place.address_components[i].long_name;
            }
        }
        document.getElementById('location').value = place.formatted_address;
        document.getElementById('lat').value = place.geometry.location.lat();
        document.getElementById('lon').value = place.geometry.location.lng();
    });
}    
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGyNRktnupsrYn90kwf2DxfOOcz7fiL74&libraries=places&callback=initMap" async defer></script> 


@endsection