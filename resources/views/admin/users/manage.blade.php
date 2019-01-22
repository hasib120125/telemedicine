@extends('layouts.adminLayouts.admin_design')

@push('styles')

@endpush

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">User</a> Manage User</div>
        <h1>Profile Management</h1>
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
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>profile Image </th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Area</th>
                        <th>Thana</th>
                        <th>District</th>
                        <th>Username</th>
                        <th>user_type</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="gradeU">
                        @if ($user->id == auth()->user()->id)
                            <td>{{$user->id}}</td>
                            <td>
                                <img class="card-img-top" src="{{ asset($user->profile_picture)}}" width="100%" height="200" alt="Card image cap">                                
                            </td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->area}}</td>
                            <td>{{$user->thana}}</td>
                            <td>{{$user->district}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->user_type}}</td>
                            <td>{{$user->email}}</td>
                            <td> 
                                <a href="{{url('admin-user-edit', $user->id)}}" class="btn btn-warning" style="display: inline;"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{route('admin.users.destroy',$user->id)}}" method="post" style="display: inline;">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>
                                <a href="{{url('admin-password-edit', $user->id)}}" class="btn btn-info" style="width: 118px;"><i class="fas fa-edit"></i> Change password</a>                                
                            </td>
                        @endif
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