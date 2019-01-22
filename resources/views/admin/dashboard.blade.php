@extends('layouts.adminLayouts.admin_design')

@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
            <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
            </div>
        <!--End-breadcrumbs-->
        
        <!--Action boxes-->
            <div class="container-fluid">
            <div class="quick-actions_homepage">
                <ul class="quick-actions">
                    @can('isAdmin')
                        <li class="bg_lb span3">
                            <a href="#"> 
                                <p>Number of Doctor</p> 
                                <p>{!! $doctor->count() !!}</p> 
                            </a> 
                        </li>
                        <li class="bg_lg span3">
                            <a href="#">
                                <p>Number of Users</p>
                                <p>{!! $user->count() !!}</p>
                             </a>
                        </li>
                        <li class="bg_dy span3"> 
                            <a href="#">
                                <p>Total Patient</p>
                                <p>{!! $patient->count() !!}</p>
                            </a>
                        </li>
                        <li class="bg_lh span3"> 
                            <a href="#">
                                <p>Total Recharge</p>
                                <p>{!! $rechargedetail->sum('recharge_amount') !!}</p>
                            </a> 
                        </li>
                        <li class="bg_lv span3"> 
                            <a href="#">
                                <p>Total Treatment</p>
                                <p>{!! $treatment->count() !!}</p> 
                            </a> 
                        </li>
                        <li class="bg_lo span3"> 
                            <a href="#">
                                <p style="font-size: 14px;">Total Treatment Transaction Amount </p>
                                <p>{!! $transction->sum('amount') !!}</p>
                            </a> 
                        </li>
                    @endcan

                    @can('isDoctor')
                        <li class="bg_lb span3"> 
                            <a href="#"> 
                                <p>Number of Treatment</p>
                                <p>{!! $doctor_dashboard->count('id') !!}</p> 
                            </a> 
                        </li>
                        <li class="bg_lg span3"> 
                            <a href="#">
                                <p>Total Income</p>
                                <p>{!! $doctor_dashboard->sum('fee') !!}</p>   
                            </a> 
                        </li>
                        <li class="bg_dy span3"> 
                            <a href="#">
                                <p>Number of Patient</p>
                                <p>{!! $doctor_dashboard->count('patient_id') !!}</p>
                            </a> 
                        </li>
                    @endcan

                    @can('isUser')
                        <li class="bg_lb span3"> 
                            <a href="#">
                                <p>Number of Patient</p> 
                                <p>{!! $user_patient->count() !!}</p> 
                            </a> 
                        </li>
                        <li class="bg_lg span3"> 
                            <a href="#">
                                <p>Number of Total Treatment</p>
                                <p>{!! $user_treatment->count() !!}</p>
                            </a> 
                        </li>
                        <li class="bg_dy span3"> 
                            <a href="#"> 
                                <p>Pending Treatment</p>
                                <p>{!! $user_treatment_pending->count() !!}</p>
                            </a> 
                        </li>
                        <li class="bg_lh span3">
                            <a href="#">
                                <p>Completed Treatment</p>
                                <p>{!! $user_treatment_complete->count() !!}</p> 
                            </a> 
                        </li>
                        <li class="bg_lv span3"> 
                            <a href="#">
                                <p>Cencle Treatment</p>
                                <p>{!! $user_treatment_cancel->count() !!}</p>
                            </a> 
                        </li>
                        <li class="bg_lo span3"> 
                            <a href="#">
                                <p>Total Recharge</p>
                                <p>{!! $user_total_recharge->sum('recharge_amount') !!}</p>
                            </a> 
                        </li>
                        <li class="bg_ly span3"> 
                            <a href="#">
                                <p>Total Fees</p>
                                <p>{!! $user_total_fee->sum('fee') !!}</p>
                            </a> 
                        </li>
                    @endcan
                </ul>
            </div>
        <!--End-Action boxes-->    
        </div>
    </div>
    <!--end-main-container-part-->

@endsection