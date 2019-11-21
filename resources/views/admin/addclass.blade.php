@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('/classes') }}"> back </a><h3>Add Class</h3></div>
                <div class="panel-body">
                @include('alert.alerts')
                    <form action="{{ url('/saveclass') }}" method="POST" enctype='multipart/form-data' >
                        <div class="form-group">
                            <label class="">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="">Brief Description</label>
                            <textarea name="desc" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="">Material</label>
                            <input type="file" name="material" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="">Start Time (GMT)</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' name="start" placeholder="2019-06-05 19:59:59" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="">Duration</label>
                            <select name="duration" class="form-control">
                                <option value="">--Select Class Duration--</option>
                                <option value="1">1hour</option>
                                <option value="1:30">1hour 30 minutes</option>
                                <option value="2">2hours</option>
                                <option value="2:30">2hours 30 minutes</option>
                                <option value="3">3hours</option>
                                <option value="3:30">3hours 30 minutes</option>
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
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                
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
