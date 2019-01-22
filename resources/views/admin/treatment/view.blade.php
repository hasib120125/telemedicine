@extends('layouts.adminLayouts.admin_design')

@push('styles')
    
@endpush

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Treatment</a>Patient List</div>
        <h1>Treatment List</h1>
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
                <h5>Treatment table</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient Name</th>
                            <th>Height</th>
                            <th>Weight</th>
                            <th>Temperature</th>
                            <th>pulse</th>
                            <th>pressure</th>
                            <th>glucose</th>
                            <th>syntoms</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Download</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($treatments as $treatment)
                            <tr class="gradeU" style="text-align:center">
                                @if ($treatment->doctor_id == auth()->user()->id)
                                    <td>{{$treatment->id}}</td>
                                    <td>{{$treatment->patient->name}}</td>
                                    <td>{{$treatment->height}}</td>
                                    <td>{{$treatment->weight}}</td>
                                    <td>{{$treatment->temperature}}</td>
                                    <td>{{$treatment->pulse}}</td>
                                    <td>{{$treatment->pressure}}</td>
                                    <td>{{$treatment->glucose}}</td>
                                    <td>{{$treatment->syntoms}}</td>
                                        @if ($treatment->status == '0')
                                            <td class="btn btn-raised btn-warning" style="font-size: 9px;height: 12px;margin-top: 11px;">pending</td>
                                            @elseif($treatment->status == '1')
                                            <td class="btn btn-raised btn-success" style="font-size: 9px;height: 12px;margin-top: 11px;">complete</td>
                                            @elseif($treatment->status == '2')
                                            <td class="btn btn-raised btn-danger" style="font-size: 9px;height: 12px;margin-top: 11px;">Cancel</td>
                                        @endif
                                    <td>
                                        @if ($treatment->status == '0')
                                            <button class="btn btn-raised btn-success">
                                                <a href="{{url('treatment-create', $treatment->id)}}" style="font-size: 9px;height: 19px;margin-top: 4px;">Start</a>   
                                            </button> |
                                            <form method="POST"  id="treatment-cancel-form-{{$treatment->id}}" action="{{route('treatment-cancel',$treatment->id)}}" style="display:none;" onsubmit="return checkForm(this);">
                                                {{csrf_field()}}
                                            </form>
                            
                                            <button onclick="if(confirm('Are You Sure, You Want to Cancel this treatment?')){
                                                    event.preventDefault();
                                                    document.getElementById('treatment-cancel-form-{{$treatment->id}}').submit();
                                            }else{
                                                event.preventDefault();
                                            }" class="btn btn-raised btn-danger disable" id="view" style="font-size: 9px;height: 24px;">Cancel<i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                            @else
                                            <button class="btn btn-raised btn-success disabled"  style="font-size: 9px;height: 26px;margin-top: 4px;">Start</button> |
                                            <button class="btn btn-raised btn-danger disabled"  style="font-size: 9px;height: 26px;margin-top: 4px;">Cancel</button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($treatment->status == '1')
                                            <form method="get"  id="prescription-download-form-{{$treatment->id}}" action="{{url('prescription-view', $treatment->id)}}" style="display:none;">
                                            </form>
                                            <button onclick="if(confirm('Are You Sure, You Want to Download this prescription?')){
                                                event.preventDefault();
                                                document.getElementById('prescription-download-form-{{$treatment->id}}').submit();
                                            }else{
                                                event.preventDefault();
                                            }" class="btn btn-raised btn-success" style="font-size: 9px;height: 24px;">Download<i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                            @else
                                            <a href="#" class="btn btn-raised btn-primary" style="font-size: 9px;height: 12px;margin-top: 11px;">Pending</a>
                                        @endif
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

@push('scripts')
<script>
       $('.disable').click(function(){
        $(this).prop('disabled', true);
        });
    </script>
@endpush