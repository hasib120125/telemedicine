@extends('layouts.frontendLayouts.frontend_design')

@section('title', '| Index')

@section('content')
    <div class="super_container">
        <div class="home d-flex flex-column align-items-start justify-content-end">
            <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('images/frontend_images/dctr_page.jpg')}}" data-speed="0.8"></div>
            <div class="home_overlay"><img src="{{asset('images/frontend_images/overlay.png')}}" alt=""></div>
            <div class="home_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">Our Doctors</div>
                                <div class="home_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                                <div class="col-xs-8 col-xs-offset-2">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Doctor List view-->
        <section class="ftco-section bg-light">
            <div class="container">
                <!--Doctor Field -->                
                <div class="row">
                    @foreach ($doctors as $doctor)
                        <div class="col-lg-4 mb-sm-4">
                            <div class="doctor">
                                <div class="d-flex mb-4">
                                    <div class="img">
                                        <img src="{{ asset($doctor->profile_picture)}}" alt="">
                                    </div>
                                    <div class="info ml-4">
                                        <h3>{{ $doctor->first_name }} {{ $doctor->last_name }}</h3>
                                        <span class="position">{{ $doctor->specialization }}</span>
                                        @if(($user_balances->available_balance) >= ($doctor->fee))
                                            <button class="get"><i class="fa fa-stethoscope" aria-hidden="true"></i><a href="{{url('/search-patient',$doctor->id)}}"> Get </a></button>
                                            @else
                                        @endif
                                    </div>
                                </div>
                                <ul class="details">
                                    <li><i class="fa fa-medkit"></i> {{ $doctor->degree }}</li>
                                    <li><i class="fa fa-hospital-o" aria-hidden="true"></i> {{ $doctor->chamber }}</li>
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> 10am-1pm &amp; 3pm-9pm; Everyday, Status: Getting Ready</li>
                                    <li class="cost"><i class="fa fa-money" aria-hidden="true"></i> <a>{{ $doctor->fee }}</a></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
            </div>
        </section>
        <!--End Doctor List view-->
@endsection