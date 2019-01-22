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
                        <h5>Edit User</h5>
                    </div>
                    <div class="widget-content nopadding">
                    <form class="form-horizontal mt-5" action="{{url('admin-password-update', $user->id)}}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT')}}
                            {{csrf_field()}}
                            <div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input type="password" name="password" value="" id="password">
                                </div>
                            </div> 
                            <div class="form-actions">
                                <input type="submit" value="Update" class="btn btn-success">
                                <a href="{{url('admin-users-manage')}}" value="" class="btn btn-success pull-left" style="margin-right: 10px;">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection