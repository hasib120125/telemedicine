@extends('layouts.adminLayouts.admin_design')

@push('styles')
    
@endpush

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Patients</a> Patients List</div>
        <h1>Patients</h1>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Patients table</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Name </th>
                            <th>Photo</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Birth</th>
                            <th>Age</th>
                            <th>Religion</th>
                            <th>Occupation</th>
                            <th>gender</th>
                            <th>Marital status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                            <tr class="gradeU">
                                                
                                <td>{{$patient->id}}</td>
                                <td>{{$patient->name}}</td>
                                <td>
                                    <img src="{{ asset("storage/upload/".$patient->image)}}" width="30%" height="10">
                                </td>
                                <td>{{$patient->mobile}}</td>
                                <td>{{$patient->email}}</td>
                                <td>{{$patient->birth}}</td>
                                <td>{{$patient->age}}</td>
                                <td>{{$patient->religion}}</td>
                                <td>{{$patient->occupation}}</td>
                                <td>{{$patient->gender}}</td>
                                <td>{{$patient->m_status}}</td> 
                                <td>
                                    <a href="{{route('patients.edit', $patient->id)}}" class="btn btn-warning" style="display: inline;"><i class="fas fa-edit"></i> Edit</a>
                                    <form action="{{route('patients.destroy',$patient->id)}}" method="post" style="display: inline;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                    </form>    
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