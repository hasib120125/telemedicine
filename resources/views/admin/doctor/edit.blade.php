@extends('layouts.adminLayouts.admin_design')

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Category</a> <a href="#" class="current">Add Category</a> </div>
    </div>
    @if (Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif   
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box"> 
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Edit Doctor</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal mt-5" action="{{route('doctor.update', $doctor->id)}}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT')}}
                            {{csrf_field()}}
                            <div class="control-group">
                                <label class="control-label">First Name</label>
                                <div class="controls">
                                    <input type="text" name="first_name" value="{{$doctor->first_name}}" id="first_name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Last Name</label>
                                <div class="controls">
                                    <input type="text" name="last_name" value="{{$doctor->last_name}}" id="last_name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Phone</label>
                                <div class="controls">
                                    <input type="text" name="phone" value="{{$doctor->phone}}" id="phone">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Country</label>
                                <div class="controls">
                                    <input type="text" name="country" value="{{$doctor->country}}" id="country">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Area</label>
                                <div class="controls">
                                    <input type="text" name="area" value="{{$doctor->area}}" id="area">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Thana</label>
                                <div class="controls">
                                    <input type="text" name="thana" value="{{$doctor->thana}}" id="thana">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">District</label>
                                <div class="controls">
                                    <input type="text" name="district" value="{{$doctor->district}}" id="district">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Postal Code</label>
                                <div class="controls">
                                    <input type="text" name="postal_code" value="{{$doctor->postal_code}}" id="postal_code">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" name="email" value="{{$doctor->email}}" id="email">
                                </div>
                            </div>                           
                            <div class="form-actions">
                                <input type="submit" value="Update" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection