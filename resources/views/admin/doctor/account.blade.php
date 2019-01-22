@extends('layouts.adminLayouts.admin_design')

@push('styles')
    
@endpush

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Doctor</a>My Account</div>
        <h1>My Account</h1>
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
                <h5>Account table</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table dataTable" id="DataTables_Table_0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Patient Name</th>
                        <th>Prescription ID</th>
                        <th>Fee</th>
                        <th>Treatment Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                        <tr>
                            <td>{{$account->id}}</td>
                            <td>{{$account->user->first_name}} {{$account->user->last_name}}</td>
                            <td>{{$account->patient->name}}</td>
                            <td>{{$account->prescription_id}}</td>
                            <td>{{$account->fee}}</td>
                            <td>{{$account->treatment_time}}</td>
                            <td>
                                @if ($account->status == '0')
                                    <button class="btn btn-warning btn-sm">pending</button>
                                    @elseif($account->status == '1')
                                    <button class="btn btn-success btn-sm">complete</button>
                                    @else
                                    <button class="btn btn-danger btn-sm">cancel</button>
                                @endif
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