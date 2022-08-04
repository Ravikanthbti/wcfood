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
                        <th>Menu Name.</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php $i=0;@endphp
                    @foreach($menus as $menu)
                        @php $i++;@endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $menu->id }}</td>
                            <td>{{ $menu->menu_name  }}</td>
                            <td>{{ $menu->item_name }}</td>
                            <td>{{ $menu->price }}</td>
                            <td><a href="{{ url('admin/edit-menu-items/'.$menu->id) }}">Edit</a></td>
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