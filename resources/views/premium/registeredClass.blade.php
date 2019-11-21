@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
<?php 
if (Auth::check()) {
    if (Auth::user()->account_type == 'premium'){
?>

            <div class="panel panel-default">
                <div class="panel-heading"><h3>Registered Classes</h3></div>
                @include('alert.alerts')
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Material</th>
                            <th>Zoom link</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;
                            $classDetails = session()->get( 'classDetails' );
                             ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$classDetails->cl_title}}</td>
                                    <td>{{$classDetails->cl_description}}</td>
                                    <td><a target="_blank" href="<?php echo url($classDetails->cl_material); ?>"> <button class="btn btn-primary btn-sm">Download material</button> </a> </td>
                                    <td>{{$classDetails->cl_zoom_link}}</td>
                                </tr>
                        </tbody>
                    </table>
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
