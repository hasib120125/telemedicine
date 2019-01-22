@extends('layouts.adminLayouts.admin_design')

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Admin</a> <a href="#" class="current">Edit Admin</a> </div>
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
                        <h5>Edit Admin</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal mt-5" action="{{route('admin.update', $admin->id)}}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT')}}
                            {{csrf_field()}}
                            <div class="control-group">
                                <label class="control-label">First Name</label>
                                <div class="controls">
                                    <input type="text" name="first_name" value="{{$admin->first_name}}" id="first_name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Last Name</label>
                                <div class="controls">
                                    <input type="text" name="last_name" value="{{$admin->last_name}}" id="last_name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Profile Picture</label>
                                <div class="controls">
                                    <input type="file" name="profile_picture" value="{{ $admin->profile_picture }}" class="file-upload">   
                                    <input type="hidden" name="is_file_delete" class="is-file-delete">
                                    <span class="file-name">{{$admin->profile_picture}}</span>
                                    <button class="file-delete-button"><i class="icon-trash"></i></button>
                                    <button class="file-revert-button" style="display:none"><i class="icon-repeat"></i></button>                                                                     
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Phone</label>
                                <div class="controls">
                                    <input type="text" name="phone" value="{{$admin->phone}}" id="phone">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Country</label>
                                <div class="controls">
                                    <input type="text" name="country" value="{{$admin->country}}" id="country">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Area</label>
                                <div class="controls">
                                    <input type="text" name="area" value="{{$admin->area}}" id="area">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Thana</label>
                                <div class="controls">
                                    <input type="text" name="thana" value="{{$admin->thana}}" id="thana">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">District</label>
                                <div class="controls">
                                    <input type="text" name="district" value="{{$admin->district}}" id="district">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">User Name</label>
                                <div class="controls">
                                    <input type="text" name="username" value="{{$admin->username}}" id="postal_code">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" name="email" value="{{$admin->email}}" id="email">
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

@push('scripts')
<script>
    $(document).on('change', '.file-upload', function(){
        $('.file-delete-button').trigger('click');
    })
    $('.file-revert-button').click(function(e){
        e.preventDefault();
        $('.is-file-delete').val(false);
        $('.file-name').css('text-decoration','none');
        $('.file-delete-button').show();
        $(this).hide();
    })
    $('.file-delete-button').click(function(e){
        e.preventDefault();
        $('.is-file-delete').val(true);
        $('.file-name').css('text-decoration','line-through');
        $('.file-revert-button').show();
        $(this).hide();
    })
</script>
@endpush