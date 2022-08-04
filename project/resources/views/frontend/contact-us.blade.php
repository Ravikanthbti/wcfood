@extends('frontend.template')

@section('content')

<!-- @include('sweet::alert') -->

   @if(Session::has('message'))
                <div class="alert alert-info">
                    {{ Session::get('message') }}
                </div>
            @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<style type="text/css">
    
form label {
  display: inline-block;
  width: 100px;
}
 
form div {
  margin-bottom: 10px;
}
 
.error {
  color: red;
  margin-left: 5px;
  position: relative;
  left: 7em;
  top: 1em;
}
 
 label.error {
  display: inline;
}
.contact-box input{
    height: 41px;
    border: 1px solid #c3c1c1;
}
.contact-box.message textarea{
    border: 1px solid #c3c1c1;
}
</style>


    <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--24">
            <div class="ht__bradcaump__wrap d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="bradcaump__inner text-center brad__white">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area --> 

        <!-- Start Contact Map -->
        <div class="contact__map__area">
            <div class="contact__map__wrapper">
                <div class="contact__map__left">
                    <div class="map__thumb">
                        <img src="{{asset('assets/images/banner/contact/1.jpg')}}" alt="images">
                    </div>
                </div>
                <div class="contact__map__right">
                    <div class="htc__google__map">
                        <div class="map-contacts">
                            <div id="googlemap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contact Map -->

        <!-- Start Address -->
        <div class="food__contact">
            <div class="food__contact__wrapper d-flex flex-wrap flex-lg-nowrap">
                <!-- Start Single Contact -->
                <div class="contact">
                    <div class="ct__icon">
                        <i class="zmdi zmdi-phone"></i>
                    </div>
                    <div class="ct__address">
                        <p><a>Phone: 0120 412 9730</a></p>
                        <p><a>Phone: 0120 412 9730</a></p>
                    </div>
                </div>
                <!-- End Single Contact -->
                <!-- Start Single Contact -->
                <div class="contact">
                    <div class="ct__icon">
                        <i class="zmdi zmdi-home"></i>
                    </div>
                    <div class="ct__address">
                        <p>Address: A-90, 3rd Floor 201301,<br>  Sector 4, Noida, Uttar Pradesh 201301 </p>
                    </div>
                </div>
                <!-- End Single Contact -->

                <!-- Start Single Contact -->
                <div class="contact">
                    <div class="ct__icon">
                        <i class="zmdi zmdi-email"></i>
                    </div>
                    <div class="ct__address">
                        <p><a href="#">delivery@e-mail.com</a></p>
                        <p><a href="#">zaika.webcoir@gmail.com</a></p>
                    </div>
                </div>
                <!-- End Single Contact -->
            </div>
        </div>

        <!-- End Address -->
        <section class="food__contact__form bg--white section-padding--lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact__form__wrap">
                            <h2>Get In Touch With Zaika</h2>
                            <div class="contact__form__inner">

                           
                            <!-- Contact-Us Form Started -->

                            <form id="contact-form" action="{{url('/storecontus')}}" method="post">
                                         @csrf

                                    <div class="single-contact-form">

                                        <div class="contact-box name d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">


            <div class="form-group form-inline">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Your name"  onkeypress="return (event.charCode > 
            64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" maxlength="35" >
  
            </div>

            <div class="form-group form-inline">
              <label for="email">Email:</label>
                <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" />
        

                @if ($errors->has('email'))
                     <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                     @endif
                </div>


                <div class="form-group form-inline">
                    <label for="phone">Phone:</label>
                    <input type="tel" name="phone" id="phone" class="form-control" onkeypress="return isNumberKey(event)" maxlength="10"  placeholder="Phone"  class="form-control {{ $errors->has('client_contact') ? ' is-invalid' : 'Phone Number is invalid' }}" value="{{old('phone') }}">

                        @if ($errors->has('phone'))
                         <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                         @endif
                </div>
                </div>
                 </div>
                    <div class="single-contact-form">
                        <div class="contact-box message">
                                <textarea name="message"  placeholder="Message*"></textarea>
                            </div>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit" class="food__btn" id="submit-email" >
                                    submit</button>
                                </div>
                            </form>

                             </div>
                            <div>
                        <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    
 
  function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }


</script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
    
$(document).ready(function() {
 
  $('#contact-form').submit(function(e) {
    e.preventDefault();
    var name = $('#name').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
 
    $(".error").remove();
 
    if (name.length < 1) {
      $('#name').after('<span class="error">Name must be required</span>');
    }
    if (phone.length < 1) {
      $('#phone').after('<span class="error">Phone no. must be required</span>');
    }
    if (email.length < 1) {
      $('#email').after('<span class="error">Email must be required</span>');
    } else {
      // var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;

         var regEx = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
      
      var validEmail = regEx.test(email);
      if (!validEmail) {
        $('#email').after('<span class="error">Please enter a valid email</span>');
      }
    }
   
  });
 
});

</script>
