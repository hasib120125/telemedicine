@extends('layouts.adminLayouts.admin_design')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/admin_css/select2.css')}}" />
@endpush
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Recharge</a> <a href="#" class="current">Add Recharge</a> </div>
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
                    <h5>Add Recharge</h5>
                </div>
                <div class="widget-content">
                    {!! Form::open(['route' => 'recharge-save','method'=>'POST', 'class' => 'form-horizontal mt-5']) !!}
                    @csrf

                    <div class="row">
                        <div class="span5">
                            <div class="control-group">
                                <label class="control-label">Select User</label>
                                <div class="controls">
                                    <select name="user_id">
                                        @if (!empty($recharge_users))
                                            @foreach ($recharge_users as $recharge_user)
                                                <option value="{{$recharge_user->id}}">{{$recharge_user->username}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>              
                            </div>
        
                            <div class="control-group">
                                <label class="control-label">Mobile</label>
                                <div class="controls">
                                    @if (!empty($users))
                                        <input type="number" name="mobile" value="{{($users->phone)}}" readonly="readonly">
                                    @endif
                                </div>
                            </div>
        
                            <input type="hidden" name="tracking_number" value="lv20r18">
        
                            <input type="hidden" name="recharge_time">
        
                            <input type="hidden" name="status" value="1">
        
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    @if (!empty($users))
                                        <input type="email" name="email" value="{{($users->email)}}" readonly="readonly">
                                    @endif
                                </div>
                            </div>
        
                            <div class="control-group">
                                <label class="control-label">Recharge Amount</label>
                                <div class="controls">
                                    <input type="number" name="recharge_amount" min="1">
                                </div>
                            </div>
                        </div>

                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">Reference Number</label>
                                <div class="controls">
                                    <input type="text" name="ref_number">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Select Recharge Type</label>
                                <div class="controls">
                                    {!! Form::select('recharge_type', ['1' => 'Cash', '2' => 'Cheque', '3' => 'Bkash', '4' => 'Rocket'], null, [ 'placeholder' => 'Select Recharge Type', 'class' => 'span7']) !!}
                                </div>          
                            </div>
        
                            <div class="control-group">
                                <label class="control-label">Remarks</label>
                                <div class="controls">
                                    <textarea class="span11" name="remarks"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <input type="submit" value="Recharge" class="btn btn-success">
                    </div>
                    {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('js/admin_js/select2.min.js')}}"></script> 
@endpush
