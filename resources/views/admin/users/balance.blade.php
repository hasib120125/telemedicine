@extends('layouts.adminLayouts.admin_design')

@push('styles')
    
@endpush

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">User Balance</a>User Balance Table</div>
        <h1>All User Balance</h1>
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
                <h5>User Balance table</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Balance</th>
                        <th>Available Balance</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($balances as $balance)
                        <tr>
                            <td>{{$balance->id}}</td>
                            <td>{{$balance->user->first_name}} {{$balance->user->last_name}}</td>
                            <td>{{$balance->balance}}</td>
                            <td>{{$balance->available_balance}}</td>
                            <td>
                                @if ($balance->status == '0')
                                    <button class="btn btn-warning btn-sm">pending</button>
                                    @elseif($balance->status == '1')
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