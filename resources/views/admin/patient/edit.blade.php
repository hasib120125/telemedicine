@extends('layouts.adminLayouts.admin_design')

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Patient</a> <a href="#" class="current">Patient Edit</a> </div>
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
                        <form class="form-horizontal mt-5" action="{{route('admin.patients.update', $patient->id)}}" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT')}}
                            {{csrf_field()}}
                            
                            <div class="control-group">
                                <label class="control-label">Patient Name</label>
                                <div class="controls">
                                    <input type="text" name="name" value="{{$patient->name}}" id="name">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Patient Mobile Number </label>
                                <div class="controls">
                                    <input type="text" name="mobile" value="{{$patient->mobile}}" id="mobile">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Patient Email </label>
                                <div class="controls">
                                    <input type="text" name="email" value="{{$patient->email}}" id="email">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Profile Image</label>
                                <div class="controls">
                                    <input type="file" name="image" value="{{$patient->image}}" class="file-upload">
                                    <input type="hidden" name="is_file_delete" class="is-file-delete">
                                    <span class="file-name">{{$patient->image}}</span>
                                    <button class="file-delete-button"><i class="icon-trash"></i></button>
                                    <button class="file-revert-button" style="display:none"><i class="icon-repeat"></i></button>                                                                  
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Birth Date </label>
                                <div class="controls">
                                    <label class="datepicker-label" for="picktime">
                                    <input type="date" name="birth" value="{{$patient->birth}}" id="date" required /></label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Patient </label>
                                <div class="controls">
                                    <input type="text" name="name" value="{{$patient->name}}" id="name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Patient Age</label>
                                <div class="controls">
                                    <input type="text" name="age" value="{{$patient->age}}" id="age">
                                </div>
                            </div>
                            <div class="control-group">                              
                                <label class="control-label" for="type">Religion :</label>
                                <div class="controls">
                                    <select class="custom-select span3" id="religion" name="religion" required>
                                        <option value="{{ $patient->religion }}" selected>{{ $patient->religion }}</option>
                                        <option value="Muslim" class=" ">Muslim</option>
                                        <option value="Hindu" class=" ">Hindu</option>
                                        <option value="Boddho" class=" ">Boddho</option>
                                        <option value="Christianity" class=" ">Christianity</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">                             
                                    <label class="control-label" for="type">Occupation :</label>
                                    <div class="controls">
                                        <select class="custom-select span3" id="occupation" name="occupation" required>
                                            <option value="{{ $patient->occupation }}" selected>{{ $patient->occupation }}</option>
                                            <option value="Farmer" class=" ">Farmer</option>
                                            <option value="Doctor" class=" ">Doctor</option>
                                            <option value="Business" class=" ">Business</option>
                                            <option value="Houewife" class=" ">Houewife</option>
                                        </select> 
                                    </div>
                            </div>
                            <div class="control-group">                              
                                    <label class="control-label" for="type">Gender :</label>
                                    <div class="controls">
                                        <select class="custom-select span3" id="gender" name="gender" required>
                                            <option value="{{ $patient->gender }}" selected>{{ $patient->gender }}</option>
                                            <option value="Male" class=" ">Male</option>
                                            <option value="Female" class=" ">Female</option>
                                            <option value="Commons" class=" ">Commons</option>
                                            <option value="Other" class=" ">Other</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="control-group">
                                    <label class="control-label" for="type">Materials Status:</label>
                                    <div class="controls">
                                        <select class="custom-select span3" id="m_status" name="m_status" required>
                                            <option value="{{ $patient->m_status }}" selected>{{ $patient->m_status }}</option>
                                            <option value="Married" class=" ">Married</option>
                                            <option value="Unmarried" class=" ">Unmarried</option>
                                            <option value="Divorce" class=" ">Divorce</option>
                                        </select>
                                    </div>
                            </div>
                                                      
                            <div class="form-actions">
                                <input type="submit" value="Update" class="btn btn-success">
                                <a href="{{url('patient-list')}}" value="" class="btn btn-success pull-left" style="margin-right: 10px;">Back</a>
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