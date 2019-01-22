@extends('layouts.adminLayouts.admin_design')

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Patient List</div>
        <h1>Patients</h1>
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
                <h5>Patient Table</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>ID </th>
                        <th>Name </th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Birth</th>
                        <th>Age</th>
                        <th>Religion</th>
                        <th>Occupation</th>
                        <th>gender</th>
                        <th>Marital status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                    <tr class="gradeU">
                        <td>{{$patient->id}}</td>
                        <td>{{$patient->name}}</td>                     
                        <td>{{$patient->mobile}}</td>
                        <td>{{$patient->email}}</td>
                        <td>{{$patient->birth}}</td>
                        <td>{{$patient->age}}</td>
                        <td>{{$patient->religion}}</td>
                        <td>{{$patient->occupation}}</td>
                        <td>{{$patient->gender}}</td>
                        <td>{{$patient->m_status}}</td>
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
@push('scripts')
 
@endpush
@endsection