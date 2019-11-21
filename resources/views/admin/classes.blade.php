@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
<?php 
if (Auth::check()) {
    if (Auth::user()->account_type == 'admin'){
?>

            <div class="panel panel-default">
                <div class="panel-heading"><h3>Manage Classes</h3></div>
                @include('alert.alerts')
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Material</th>
                            <th>Start Date</th>
                            <th>Expected duration</th>
                            <th>Zoom link</th>
                            <th>Status</th>
                            <th width="200px">Action</th>
                            </tr>
                        </thead>
                        <a href="{{ url('/addclass') }}"><button type="button" class="btn btn-primary btn-sm" >Add Class</button></a> &nbsp;<button type="button" class="btn btn-default btn-sm" >Records {{ $classes->firstItem() }} - {{ $classes->lastItem() }} of {{ $classes->total() }} </button>
                        <p></p>
                        <tbody>
                            <?php $i=1;
                            foreach($classes as $class) { ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$class->cl_title}}</td>
                                    <td>{{$class->cl_description}}</td>
                                    <td>{{$class->cl_material}}</td>
                                    <td>{{$class->cl_start}}</td>
                                    <td>{{$class->cl_duration}}</td>
                                    <td>{{$class->cl_zoom_link}}</td>
                                    <td>{{$class->cl_status}}</td>
                                    <td><a href="{{ url('/class/edit/'.$class->cl_id.'') }}" ><button type="button" class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></button></a> &nbsp;<a href="{{ url('/class/delete/'.$class->cl_id.'') }}" ><button type="button" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button></a> </td>
                                </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>

                    {{ $classes->links() }}
                </div>
            </div>
<?php } else{?>
<h3> Unauthorized </h3>
<?php } } else { ?>  
<script type="text/javascript">
    window.location = "{{ url('/login') }}";
</script>
<?php } ?>
        </div>
    </div>
</div>
@endsection
