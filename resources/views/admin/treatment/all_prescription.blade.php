@extends('layouts.adminLayouts.admin_design')

@push('styles')
    
@endpush

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Prescription</a></div>
        <h1>Prescription List</h1>
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
                            <th>User Name</th>
                            <th>Patient Name</th>
                            <th>Doctor Name</th>
                            <th>Download</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($prescriptions as $prescription)
                            <tr class="gradeU">
                                <td>{{$prescription->prescription_id}}</td>
                                <td>{{$prescription->client->first_name}} {{$prescription->client->last_name}}</td>
                                <td>{{$prescription->patient->name}}</td>
                                <td>{{$prescription->user->first_name}} {{$prescription->user->last_name}}</td>
                                <td>
                                    @if ($prescription->status == '1')
                                        <a href="{{url('prescription-download', $prescription->id)}}" class="btn btn-raised btn-success" target="_blank"><i class="fas fa-file-download"></i>Download</a>
                                        @else
                                        <a href="#" class="btn btn-raised btn-danger" target="_blank"><i class="fas fa-file-download"></i>Download</a>
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

@push('scripts')

@endpush