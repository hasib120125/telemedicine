@extends('layouts.adminLayouts.admin_design')

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Pataint</a> <a href="#" class="current">Add Pataint</a> </div>
    </div>
    
    <!--flash message-->
    @if(Session::has('flash_message_success'))
        <div class="container">      
            <div class="alert alert-success"><em> {!! session('flash_message_success') !!}</em>
            </div>
        </div>
    @endif 

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif   
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add Patient</h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal mt-5" action="{{route('patients.store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Name</label>
                                    <div class="controls">
                                        <input class="form-control" type="text" name="name" id="name" placeholder="Enter Patient Name">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">mobile</label>
                                    <div class="controls">
                                        <input class="form-control" type="text" name="mobile" id="mobile" placeholder="Enter Patient Mobile Number ">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input class="form-control" type="text" name="email" id="email" placeholder="Enter Patient Email Address ">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Profile Image</label>
                                    <div class="controls">
                                        <input type="file" name="image">                                
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Date of Birth</label>
                                    <div class="controls">                                        
                                        <label class="datepicker-label" for="picktime">
                                        <input type="date" name="birth" id="date" required /></label>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Age</label>
                                    <div class="controls">
                                        <input class="form-control" type="text" name="age" id="age" placeholder="Enter Patient Age ">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="type">Religion :</label>
                                    <div class="controls">
                                        <select class="custom-select" id="religion" name="religion" value="{{ old('religion') }}" required>
                                            <option selected>Select your type</option>
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
                                        <select class="custom-select" id="occupation" name="occupation" value="{{ old('occupation') }}" required>
                                        <option selected>Select your type</option>
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
                                        <select class="custom-select" id="gender" name="gender" value="{{ old('gender') }}" required>
                                            <option selected>Select your type</option>
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
                                        <select class="custom-select" id="m_status" name="m_status" value="{{ old('m_status') }}" required>
                                            <option selected>Select your type</option>
                                            <option value="Married" class=" ">Married</option>
                                            <option value="Unmarried" class=" ">Unmarried</option>
                                            <option value="Divorce" class=" ">Divorce</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" value="SUBMIT" class="btn btn-success pull-right">
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection