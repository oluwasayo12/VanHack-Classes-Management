@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('/classes') }}"> back </a><h3>Edit Class</h3></div>
                <div class="panel-body">
                @include('alert.alerts')
                    <form action="{{ url('/updateClass') }}" method="POST" enctype='multipart/form-data' >
                        <div class="form-group">
                            <label class="">Title</label>
                            <input type="text" value="<?php echo $classDetails['cl_title'] ?>" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="">Brief Description</label>
                            <textarea name="desc" class="form-control"><?php echo $classDetails['cl_description'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="">Material</label>
                            <input type="file" name="material" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="">Start Time (GMT)</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' name="start" value="<?php echo $classDetails['cl_start'] ?>" placeholder="2019-06-05 19:59:59" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="">Duration</label>
                            <select name="duration" class="form-control">
                                <option value="">--Select Class Duration--</option>
                                <option <?php if($classDetails['cl_duration'] == '1') echo "selected"; ?> value="1">1hour</option>
                                <option <?php if($classDetails['cl_duration'] == '1:30') echo "selected"; ?> value="1:30">1hour 30 minutes</option>
                                <option <?php if($classDetails['cl_duration'] == '2') echo "selected"; ?> value="2">2hours</option>
                                <option <?php if($classDetails['cl_duration'] == '2:30') echo "selected"; ?> value="2:30">2hours 30 minutes</option>
                                <option <?php if($classDetails['cl_duration'] == '3') echo "selected"; ?> value="3">3hours</option>
                                <option <?php if($classDetails['cl_duration'] == '3:30') echo "selected"; ?> value="3:30">3hours 30 minutes</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label class="">Zoom Link</label>
                            <div class="input-group">
                            <input type="text" name="zoomLink" value="https://zoomlink.com/123456" readonly class="form-control" style="width:98%;">
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-warning btn-sm">Generate zoom link</button>
                            </span>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="">Status</label>
                            <select name="status" class="form-control">
                                <option  value="Enabled">Enabled</option>
                                <option  value="Disabled">Disabled</option>
                                <option value="Ended">Ended</option>
                            </select>
                        </div> 
                        
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                        <input type="hidden" name="cid" value="<?php echo $classDetails['cl_id']; ?>">               
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
