@extends('layouts.adminLayouts.admin_design')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/admin_css/dataTables.bootstrap.css')}}">
@endpush

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Transaction</a>All Transaction List</div>
        <h1>All Transaction List</h1>
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
            <div class="widget-content">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Transaction Time</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{$transaction->id}}</td>
                                <td>{{$transaction->transaction_time}}</td>
                                <td>{{$transaction->debit}}</td>
                                <td>{{$transaction->credit}}</td>
                                <td>{{$transaction->balance}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <ul class="pagination">
                    <li>{{ $transactions->links() }}</li>
                </ul>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection