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
                <div class="panel-heading"><h3>Previous classes</h3></div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Material</th>
                            <th>Status</th>
                            </tr>
                        </thead>
                        <p></p>
                        <tbody>
                            <?php $i=1;
                            foreach($classes as $class) { ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$class->cl_title}}</td>
                                    <td>{{$class->cl_description}}</td>
                                    <td><a target="_blank" href="<?php echo url($class->cl_material); ?>"> <button class="btn btn-primary btn-sm">Download material</button> </a> </td>
                                    <td>{{$class->cl_status}}</td>
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
