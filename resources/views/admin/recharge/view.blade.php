@extends('layouts.adminLayouts.admin_design')

@push('styles')


@endpush

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Recharge</a> View Recharge</div>
        <h1>Recharge History</h1>
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
                <h5>Recharge table</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>SI</th>
                        <th>User Name</th>
                        <th>Tracking Number</th>
                        <th>Recharge Time</th>
                        <th>Recharge Amount</th>
                        <th>Recharge Type</th>
                        <th>Ref. Number</th>
                        <th>Mobile</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recharges as $recharge)
                        <tr class="gradeU">
                            <td>{{$recharge->id}}</td>
                            <td>{{$recharge->user->first_name}} {{$recharge->user->last_name}}</td>
                            <td>{{$recharge->tracking_number}}</td>
                            <td>{{$recharge->recharge_time}}</td>
                            <td>{{$recharge->recharge_amount}}</td>
                            <td>
                                @if ($recharge->recharge_type == '1')
                                    Cash

                                    @elseif($recharge->recharge_type == '2')
                                    Cheque

                                    @elseif($recharge->recharge_type == '3')
                                    Bkash

                                    @elseif($recharge->recharge_type == '4')
                                    Rocket
                                @endif
                            </td>
                            <td>{{$recharge->ref_number}}</td>
                            <td>{{$recharge->mobile}}</td>
                            <td>
                                @can('isAdmin')
                                    @if ($recharge->status == '1')
                                        <a href="#" class="btn btn-success" style="font-size: 10px;">Approved</a>
                                        @else
                                        <form method="POST"  id="recharge-approve-form-{{$recharge->id}}" action="{{route('user-recharge-approve',$recharge->id)}}" style="display:none;">
                                            {{csrf_field()}}
                                        </form>
                            
                                        <button onclick="if(confirm('Are You Sure, You Want to Approved This Recharge?')){
                                                event.preventDefault();
                                                document.getElementById('recharge-approve-form-{{$recharge->id}}').submit();
                                        }else{
                                            event.preventDefault();
                                        }" class="btn btn-raised btn-warning" style="font-size: 9px;height: 24px;">pending<i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    @endif
                                @endcan

                                @can('isUser')
                                    @if ($recharge->status == '1')
                                        <button class="btn btn-success" style="font-size: 10px;">Approved</button>
                                        @else
                                        <button class="btn btn-warning" style="font-size: 10px;">Pending</button>
                                    @endif
                                @endcan
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
   
@endpush