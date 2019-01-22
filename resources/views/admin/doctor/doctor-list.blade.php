@extends('layouts.adminLayouts.admin_design')

@push('styles')
    
@endpush

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Doctors</a>Doctors List</div>
        <h1>Doctors</h1>
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
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Doctors table</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table dataTable" id="DataTables_Table_0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Profile</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Area</th>
                        <th>Thana</th>
                        <th>District</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Specialization</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                        <tr class="gradeU">
                            <td>{{$doctor->id}}</td>
                            <td>
                                <img class="card-img-top" src="{{ asset($doctor->profile_picture)}}" width="100%" height="200" alt="Card image cap">                                
                            </td>
                            <td>{{$doctor->first_name}}</td>
                            <td>{{$doctor->last_name}}</td>
                            <td>{{$doctor->phone}}</td>
                            <td>{{$doctor->country}}</td>
                            <td>{{$doctor->area}}</td>
                            <td>{{$doctor->thana}}</td>
                            <td>{{$doctor->district}}</td>
                            <td>{{$doctor->username}}</td>
                            <td>{{$doctor->email}}</td>
                            <td>{{$doctor->gender}}</td>
                            <td>{{$doctor->specialization}}</td>
                            @if ($doctor->status == '0')
                                <td>
                                    <form method="POST"  id="status-active-form-{{$doctor->id}}" action="{{route('doctor-active-status',$doctor->id)}}" style="display:none;">
                                            {{csrf_field()}}
                                        </form>
                        
                                        <button onclick="if(confirm('Are You Sure, You Want to Active This doctor?')){
                                                event.preventDefault();
                                                document.getElementById('status-active-form-{{$doctor->id}}').submit();
                                        }else{
                                            event.preventDefault();
                                        }" class="btn btn-raised btn-warning" style="font-size: 9px;height: 24px;">pending<i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                </td>
                                @else
                                <td>
                                    <form method="POST"  id="status-pending-form-{{$doctor->id}}" action="{{route('doctor-pending-status',$doctor->id)}}" style="display:none;">
                                            {{csrf_field()}}
                                        </form>
                        
                                        <button onclick="if(confirm('Are You Sure, You Want to Pending This doctor?')){
                                                event.preventDefault();
                                                document.getElementById('status-pending-form-{{$doctor->id}}').submit();
                                        }else{
                                            event.preventDefault();
                                        }" class="btn btn-raised btn-success" style="font-size: 9px;height: 24px;">Active<i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                </td>
                            @endif
                            <td style="width:80px"><a href="{{route('admin.doctor.edit', $doctor->id)}}" class="btn btn-raised btn-success" style="height: 11px;font-size: 10px;width: 26px;margin-bottom: 1px;">Edit</a>||
                                <form method="POST"  id="delete-form-{{$doctor->id}}" action="{{route('delete-doctor',$doctor->id)}}" style="display:none;">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                    </form>
                    
                                    <button onclick="if(confirm('Are You Sure, You Want to Delete This?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$doctor->id}}').submit();
                                    }else{
                                        event.preventDefault();
                                    }" class="btn btn-raised btn-danger" style="font-size: 9px;height: 24px;">Delete<i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
   

    <script>
        $('#delete-category').click(function(){
            if(confirm('Are You Sure Want to Delete this Category??')){
                return true;
            }
            return false;
        });
    </script>
@endpush