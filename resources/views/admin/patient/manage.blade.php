@extends('layouts.adminLayouts.admin_design')

@push('styles')

@endpush

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Categories</a> View Categories</div>
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
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Category URL</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="gradeU">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="center"></td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection