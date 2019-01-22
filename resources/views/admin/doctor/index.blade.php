@extends('layouts.master')
@section('title', '| Doctor list')
@section('content')

<div class="col-lg-10 col-lg-offset-1">   
    <div class="table-responsive"><br><br><br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>Area</th>
                    <th>Thana</th>
                    <th>District</th>
                    <th>Post Code</th>
                    <th>Status</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                    <th>Approve</th>
                </tr> 
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>
                   
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->area }}</td>
                        <td>{{ $user->thana }}</td>
                        <td>{{ $user->district }}</td>
                        <td>{{ $user->post_code }}</td>
                        <td>{{ $user->type }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                                      
                        </td>
                        <td>
                            
                        </td>
                  
                </tr>
                <tr>
                    @role('Admin')
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->area }}</td>
                        <td>{{ $user->thana }}</td>
                        <td>{{ $user->district }}</td>
                        <td>{{ $user->post_code }}</td>
                        <td>{{ $user->type }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                        <td>
                            {{  $user->roles()->pluck('name')->implode(' ') }}
                        </td>
                        <td>
                            <a href="{{ route('doctor.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['doctor.destroy', $user->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                    
                            <a href="{{ route('doctor.show', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Show</a>

                        </td>
                        <td>
                            <!--Approval-->
					    </td>
                    @endrole
                </tr>

                @endforeach
            </tbody>

        </table>
    </div>

    <!-- <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a> -->

</div>

@endsection





                    
               