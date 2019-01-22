<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="active"><a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>

        @can('isAdmin')
        <li><a href="{{route('user-list')}}"><i class="icon icon-info-sign"></i> <span>User List</span></a> </li>
        <li><a href="{{route('doctor-list')}}"><i class="icon icon-info-sign"></i> <span>Doctor List</span></a> </li>
        <li><a href="{{route('patients')}}"><i class="icon icon-info-sign"></i> <span>Patient List</span></a> </li>
        <li><a href="{{url('prescription-list')}}"><i class="icon icon-info-sign"></i> <span>Prescription List</span></a> </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Recharge</span> <span class="label label-important">1</span></a>
            <ul>
                <li><a href="{{route('recharge')}}">Create Recharge</a></li>
                <li><a href="{{route('manage-recharge')}}">View Recharge</a></li>
            </ul>
        </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Balance</span> <span class="label label-important">1</span></a>
            <ul>
                <li><a href="{{url('user-balance')}}">User Balance</a></li>
                <li><a href="{{url('doctor-bill')}}">Doctor Bills</a></li>
            </ul>
        </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Admin</span> <span class="label label-important">1</span></a>
            <ul>
                <li><a href="{{route('admin-create')}}">Admin Create</a></li>
                <li><a href="{{route('admin-list')}}">Admin List</a></li>
            </ul>
        </li>        
        @endcan

        @can('isDoctor')
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Doctor Field</span> <span class="label label-important">1</span></a>
            <ul>
                <li><a href="{{url('admin-users-manage')}}">View Profile</a></li>
                <li><a href="{{url('doctor-acount')}}">View Account</a></li>
            </ul>
        </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Treatment</span> <span class="label label-important">1</span></a>
            <ul>
                <li><a href="{{url('treatment-view')}}">Treatment List</a></li>
                {{-- <li><a href="{{url('treatment-create')}}">Treatment Create</a></li> --}}
            </ul>
        </li>
        @endcan

        @can('isUser')
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>User Field</span> <span class="label label-important">3</span></a>
            <ul>
                <li><a href="{{url('admin-users-manage')}}">View Profile</a></li>
                <li><a href="{{url('user-account')}}">View Account</a></li>
                <li><a href="{{url('patients/create')}}">Create Patient</a></li>
                <li><a href="{{route('patient-list')}}">Manage Patient</a></li>
            </ul>
        </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Treatment</span> <span class="label label-important">1</span></a>
            <ul>
                <li><a href="{{url('/doctor')}}">Treatment Create</a></li>
                <li><a href="{{url('user-transaction-list')}}">Transaction List</a></li>
                <li><a href="{{url('/treatment-patient-list')}}">Treatment Patient List</a></li>
            </ul>
        </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Recharge</span> <span class="label label-important">1</span></a>
            <ul>
                <li><a href="{{route('user-recharge')}}">Create Recharge</a></li>
                <li><a href="{{route('manage-recharge')}}">View Recharge</a></li>
            </ul>
        </li>

        @endcan
    </ul>
</div>