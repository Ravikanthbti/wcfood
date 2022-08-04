@extends('admin_dashboard.dashboard')

@section('content')

<div class="row">
        <div class="col-md-12">


            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">

                        <thead>
                        <tr>
                            <th>SNo.</th>
                            <th>ID#</th>
                            <th>Cat Name.</th>
                            <th>Cat Desc.</th>
                            
                        </tr>
                        </thead>

                        <tbody>
                        @php $i=0;@endphp
                        @foreach($categories as $category)
                            @php $i++;@endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $category->category_id  }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_description }}</td>
                               
                            
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="text-center">
                       
                    </div>
                </div>
            </div>

        </div>
    </div><!-- ROW-->
@endsection