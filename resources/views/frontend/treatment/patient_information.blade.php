@extends('layouts.frontendLayouts.frontend_design')

@section('title', '| Index')


@section('content')
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
                            <!--<div class="input-group">
                                <div class="input-group-btn search-panel">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <span id="search_concept"></span> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Telemed</a></li>
                                        <li><a href="#">Demand</a></li>

                                    </ul>
                                </div>
                                <input type="hidden" name="search_param" value="all" id="search_param">
                                <input type="text" class="form-control" name="x" placeholder="Search doc_ds">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </span>
                            </div-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section bg-light">
    <div class="container">
        <form class="example" action="{{url('patient-information')}}" method="get">

        <div class="row">
            <div class="col-lg-4 mb-sm-4">
                <div class="doc_d">
                    <div class="d-flex mb-4">
                        
                        <div class="img-d">
                            <img class="card-img-top" src="{{ asset($doctor->profile_picture)}}" width="100%" height="200" alt="Card image cap">                                                                
                        </div>
                    </div>
                    <ul class="details">
                        {{ Form::hidden('doctor_id', $doctor->id) }}
                        <h3><i class="fa fa-user-o" aria-hidden="true"></i> {{ $doctor->first_name }}</h3>
                        <li><i class="fa fa-medkit"></i>{{ $doctor->specialization }}</li>
                        <li><i class="fa fa-eyedropper" aria-hidden="true"></i>{{ $doctor->degree }}</li>
                        <li><i class="fa fa-hospital-o" aria-hidden="true"></i>{{ $doctor->chamber }}</li>
                    </ul>
                </div>
            </div>


            <div class="col-lg-6 mb-sm-4">
                <div class="doc_d">
                    <div class="d-flex mb-4">
                        <div class="img-d">
                            <img src="{{ asset("storage/upload/".$patient->image)}}" width="30%" height="10">                                
                        </div>
                    </div>
                </div>
                <div class="top">                                          
                
                    <p>If you do not have patient id.<a href="{{url('user-registration')}}"> For register click hare</a></p> --}}       
                    <form id="contact" action="" method="post">

            <div class="col-lg-4 mb-sm-4">
                <div class="top">
                    <h3>Search A Patient</h3>
                    <p>If you do not have patient id.<a href="#"> For register click hare</a></p>

                    {!! Form::open(['url' => 'patient-information-save','method'=>'POST', 'enctype' => 'multipart/form-data']) !!}

                        <h3>PATIENT INFORMATION</h3>
                        <fieldset>
                            <input placeholder="Height" type="tel" tabindex="1" required autofocus>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Weight" type="tel" tabindex="2" required>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Temperature" type="tel" tabindex="3" required>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Pulse Rate" type="tel" tabindex="4" required>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Blood Pressure" type="tel" tabindex="4" required>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Blood Glucose" type="tel" tabindex="4" required>
                        </fieldset>
                        <fieldset>
                            <input placeholder="Symtoms" type="tel" tabindex="4" required>
                        </fieldset>
                        <fieldset>
                           <lebel>Add Reports</lebel>
                           <br>
                            <input type="file" name="pic" accept="image/*">
                        </fieldset>
                        <fieldset class="col-sm-12" style="padding: 0;margin-top: 20px;">
                            <a href="#"><button class="col-lg-3" name="previous" type="submit" id="contact-submit">Previous</button></a>
                            <button class="col-lg-3" name="submit" type="submit" id="contact-submit">Submit</button>
                        </fieldset>

                    </form>
                    <div class="btn">
                        <a href="{{url('patient-information')}}" class="btn btn-primary">Next</a>
                    </div>

                   {!! Form::close() !!}

                </div>
            </div>
        </div>
        </form>
    </div>
</section>
@endsection
                    