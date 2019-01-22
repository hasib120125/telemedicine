@extends('layouts.adminLayouts.admin_design')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/admin_css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin_css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin_css/uniform.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin_css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin_css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/admin_css/matrix-media.css')}}" />

@endpush

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Categories</a> View Categories</div>
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
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Area</th>
                        <th>Thana</th>
                        <th>District</th>
                        <th>Postal Code</th>
                        <th>Username</th>
                        <th>user_type</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="gradeU">
                        <td>{{$user->id}}</td>
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