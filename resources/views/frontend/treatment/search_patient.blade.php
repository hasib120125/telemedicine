@extends('layouts.frontendLayouts.frontend_design')

@section('title', '| Index')

@section('content')
     <!-- Home -->
     <div class="home d-flex flex-column align-items-start justify-content-end">
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('images/frontend_images/dctr_page.jpg')}}" data-speed="0.8"></div>
        <div class="home_overlay"><img src="{{asset('images/frontend_images/overlay.png')}}" alt=""></div>
        <div class="home_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="home_title"></div>
                            <div class="home_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                            <div class="col-xs-8 col-xs-offset-2">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-section bg-light">
        <div class="container">
            <form class="example" action="{{url('patient-search-result')}}" method="get">
            <div class="row">
                <div class="col-lg-6 mb-sm-4">
                    <div class="doc_d">
                        <div class="d-flex mb-4">
                            
                            <div class="img-d">
                                <img class="card-img-top" src="{{ asset($doctor->profile_picture)}}" width="100%" height="200" alt="Card image cap">                                                                
                            </div>
                        </div>
                        <ul class="details">
                            {{ Form::hidden('doctor_id', $doctor->id) }}
                            <h3><i class="fa fa-user-o" aria-hidden="true"></i> {{ $doctor->first_name }} {{ $doctor->last_name }}</h3>
                            <li><i class="fa fa-medkit"></i>{{ $doctor->specialization }}</li>
                            <li><i class="fa fa-eyedropper" aria-hidden="true"></i>{{ $doctor->degree }}</li>
                            <li><i class="fa fa-hospital-o" aria-hidden="true"></i>{{ $doctor->chamber }}</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 mb-sm-4">
                    <div class="side">
                        <h3>Search A Patient</h3>

                        <input type="text" placeholder="Enter Patient ID" name="patient_id">
                        <button type="submit"><i class="fa fa-search"></i></button>

                        <p>If you do not have patient id.<a href="{{url('/patients/create')}}"> For register click hare</a></p>

                        
                        <div class="btn">
                            <a href="{{url('/treatment-create')}}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>
@endsection