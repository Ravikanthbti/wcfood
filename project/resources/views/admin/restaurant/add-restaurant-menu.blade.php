@extends('admin_dashboard.dashboard')
@section('style')
@endsection
@section('content')
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

                <form method="post" id="add_restaurent_form_id" action=" {{ url('admin/restaurant-store-menus') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">


                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <input type="hidden" id="required2" name="restaurant_id" class="form-control" required value="{{ $restaurant->restaurant_id }}" />
                                        <div class="form-group col-md-4" >
                                            <label class="control-label control_name"> Menu Name:</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" id="required2" name="menu_name" class="form-control" required value="{{ old('menu_name') }}"   onkeypress="return (event.charCode > 
                                            64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"  />
                                            
                                              @error('menu_name')
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
                                            <label class="control-label control_name">Menu Description: </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" id="required2" name="menu_description" class="form-control" required value="{{ old('menu_description') }}"/>
                                                @error('menu_description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
 
     

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> Add Menu</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


