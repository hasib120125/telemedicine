@extends('layouts.adminLayouts.admin_design')

@push('styles')
    
@endpush

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Users</a>Users List</div>
        <h1>Users</h1>
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
                <h5>User table</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
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
                        <th>Postal Code</th>
                        <th>User Name</th>
                        <th>User Type</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="gradeU">
                            <td>{{$user->id}}</td>
                            <td>
                                <img class="card-img-top" src="{{ asset($user->profile_picture)}}" width="100%" height="200" alt="Card image cap">                                
                            </td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->country}}</td>
                            <td>{{$user->area}}</td>
                            <td>{{$user->thana}}</td>
                            <td>{{$user->district}}</td>
                            <td>{{$user->postal_code}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->user_type}}</td>
                            <td>{{$user->email}}</td>
                            @if ($user->status == '0')
                                <td>
                                    <form method="POST"  id="status-active-form-{{$user->id}}" action="{{route('user-active-status',$user->id)}}" style="display:none;">
                                        {{csrf_field()}}
                                    </form>
                        
                                    <button onclick="if(confirm('Are You Sure, You Want to Active This User?')){
                                            event.preventDefault();
                                            document.getElementById('status-active-form-{{$user->id}}').submit();
                                    }else{
                                        event.preventDefault();
                                    }" class="btn btn-raised btn-warning" style="font-size: 9px;height: 24px;">pending<i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </td>
                                @else
                                <td>
                                    <form method="POST"  id="status-pending-form-{{$user->id}}" action="{{route('user-pending-status',$user->id)}}" style="display:none;">
                                            {{csrf_field()}}
                                        </form>
                        
                                        <button onclick="if(confirm('Are You Sure, You Want to Pending This User?')){
                                                event.preventDefault();
                                                document.getElementById('status-pending-form-{{$user->id}}').submit();
                                        }else{
                                            event.preventDefault();
                                        }" class="btn btn-raised btn-success" style="font-size: 9px;height: 24px;">Active<i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                </td>
                            @endif
                            <td style="width:80px"><a href="{{route('admin-user-edit', $user->id)}}" class="btn btn-raised btn-success" style="height: 11px;font-size: 10px;width: 26px;margin-bottom: 1px;">Edit</a>||
                                    <form method="POST"  id="delete-form-{{$user->id}}" action="{{route('delete-user',$user->id)}}" style="display:none;">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                    </form>
                    
                                    <button onclick="if(confirm('Are You Sure, You Want to Delete This?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$user->id}}').submit();
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