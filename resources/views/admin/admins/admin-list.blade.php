@extends('layouts.adminLayouts.admin_design')

@push('styles')
    
@endpush

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Admin</a>Admin List</div>
        <h1>Admin</h1>
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
                <h5>Admin table</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table dataTable" id="DataTables_Table_0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Profile picture </th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Area</th>
                        <th>Thana</th>
                        <th>District</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr class="gradeU">
                            <td>{{$admin->id}}</td>
                            <td>{{$admin->first_name}}</td>
                            <td>{{$admin->last_name}}</td>
                            <td>
                                <img class="card-img-top" src="{{ asset($admin->profile_picture)}}" width="100%" height="200" alt="Card image cap">                                
                            </td>
                            <td>{{$admin->phone}}</td>
                            <td>{{$admin->country}}</td>
                            <td>{{$admin->area}}</td>
                            <td>{{$admin->thana}}</td>
                            <td>{{$admin->district}}</td>
                            <td>{{$admin->username}}</td>
                            <td>{{$admin->email}}</td>
                            <td style="width:80px"><a href="{{route('admin.edit', $admin->id)}}" class="btn btn-raised btn-success" style="height: 11px;font-size: 10px;width: 26px;margin-bottom: 1px;">Edit</a>||
                                <form action="{{route('admin.destroy',$admin->id)}}" method="post" style="display: inline;">
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
@push('scripts')
   

    <script>
        $('#delete-category').click(function(){
            if(confirm('Are You Sure Want to Delete this Category??')){
                return true;
            }
            return false;
        });
    </script>
@endpush