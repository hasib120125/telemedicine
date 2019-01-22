@extends('layouts.adminLayouts.admin_design')

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Admin </a> <a href="#" class="current">Admin Create</a> </div>
    </div>
    @if (Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif   
    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Create Admin</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal mt-5" action="{{route('admin-save')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="control-group">
                                <label class="control-label">First Name</label>
                                <div class="controls">
                                    <input type="text" name="first_name" value="" id="first_name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Last Name</label>
                                <div class="controls">
                                    <input type="text" name="last_name" value="" id="last_name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Profile Picture</label>
                                <div class="controls">
                                    <input type="file" name="profile_picture">                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Phone</label>
                                <div class="controls">
                                    <input type="text" name="phone" value="" id="phone">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Country</label>
                                <div class="controls">
                                    <input type="text" name="country" value="" id="country">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Area</label>
                                <div class="controls">
                                    <input type="text" name="area" value="" id="area">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Thana</label>
                                <div class="controls">
                                    <input type="text" name="thana" value="" id="thana">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">District</label>
                                <div class="controls">
                                    <input type="text" name="district" value="" id="district">
                                </div>
                            </div>
                           
                            <input type="hidden" name="user_type" value="admin">
                            <input type="hidden" name="status" value="1">

                            <div class="control-group">
                                <label class="control-label">User Name</label>
                                <div class="controls">
                                    <input type="text" name="username" value="" id="username">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" name="email" value="" id="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input type="password" name="password" value="" id="password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Confirm Password</label>
                                <div class="controls">
                                    <input type="password" name="cpass" value="" id="password">
                                </div>
                            </div>
                            
                            <div class="form-actions">
                                <input type="submit" value="Create Admin" class="btn btn-success">
                                <a href="{{url('admin-list')}}" value="" class="btn btn-success pull-left" style="margin-right: 10px;">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection