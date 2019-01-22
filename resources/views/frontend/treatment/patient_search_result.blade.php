@extends('layouts.frontendLayouts.frontend_design')

@section('title', '| Index')

@push('styles')
<link rel="stylesheet" href="{{asset('css/frontend_css/about.css')}}">
@endpush

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
        <div class="row">
            <div class="col-sm-4">
                <div class="doc_d">
                    <div class="d-flex mb-4">
                        
                        <div class="img-d">
                            <img class="card-img-top" src="{{ asset($doctor->profile_picture)}}" width="100%" height="200" alt="Card image cap">                                                                
                        </div>
                    </div>
                    <ul class="details">
                        <h3><i class="fa fa-user-o" aria-hidden="true"></i> {{ $doctor->first_name }} {{ $doctor->last_name }}</h3>
                        <li><i class="fa fa-medkit"></i>{{ $doctor->specialization }}</li>
                        <li><i class="fa fa-eyedropper" aria-hidden="true"></i>{{ $doctor->degree }}</li>
                        <li><i class="fa fa-hospital-o" aria-hidden="true"></i>{{ $doctor->chamber }}</li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="top">                                                
                    <table class="table-fill">
                        <tbody class="table-hover">
                            <tr>
                                <td class="text-left"><i class="fa fa-id-badge" aria-hidden="true"></i> Patient ID</td>
                                <td class="text-left">{{ $patient->id }}</td>
                            </tr>
                            <tr>
                                <td class="text-left"><i class="fa fa-user-o" aria-hidden="true"></i>Name</td>
                                <td class="text-left">{{ $patient->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-left"><i class="fa fa-user-o" aria-hidden="true"></i>Email</td>
                                <td class="text-left">{{ $patient->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-left"><i class="fa fa-venus-mars" aria-hidden="true"></i> Gender</td>
                                <td class="text-left">{{ $patient->gender }}</td>
                            </tr>
                            <tr>
                                <td class="text-left"><i class="fa fa-calendar" aria-hidden="true"></i> Age</td>
                                <td class="text-left">{{ $patient->age }}</td>
                            </tr>
                            <tr>
                                <td class="text-left"><i class="fa fa-phone-square" aria-hidden="true"></i> Mobile</td>
                                <td class="text-left">{{ $patient->mobile }}</td>
                            </tr>
                            <tr>
                                <td class="text-left"><i class="fa fa-life-ring" aria-hidden="true"></i> Birth Date</td>
                                <td class="text-left">{{ $patient->birth }}</td>
                            </tr>
                            <tr>
                                <td class="text-left"><i class="fa fa-life-ring" aria-hidden="true"></i> Religion</td>
                                <td class="text-left">{{ $patient->religion }}</td>
                            </tr>
                            <tr>
                                <td class="text-left"><i class="fa fa-id-card" aria-hidden="true"></i> Occupation</td>
                                <td class="text-left">{{ $patient->occupation }}</td>
                            </tr>
                            <tr>
                                <td class="text-left"><i class="fa fa-universal-access" aria-hidden="true"></i> M. Status</td>
                                <td class="text-left">{{ $patient->m_status }}</td>
                            </tr>
                            <tr>
                                <td class="text-left"><i class="fa fa-file-image-o" aria-hidden="true"></i> Photo</td>
                                <td class="text-left">Blank</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4 mb-sm-4">
                <div class="top">
                    {!! Form::open(['url' => ['patient-information-save',$patient->id], 'method'=>'POST', 'id' => 'contact', 'enctype' => 'multipart/form-data']) !!}
                        <h3>PATIENT INFORMATION</h3>
                        <fieldset>
                            <input type="text" placeholder="Height" name="height" tabindex="1" required autofocus>
                        </fieldset>
                        
                        <fieldset>
                            <input type="text" placeholder="Weight" name="weight" tabindex="2" required>
                        </fieldset>
                    
                        <fieldset>
                            <input type="text" placeholder="Temperature" name="temperature" tabindex="3" required>
                        </fieldset>
                        <fieldset>
                            <input type="text" placeholder="Pulse Rate" name="pulse_rate" tabindex="4" required>
                        </fieldset>
                        <fieldset>
                            <input type="text" placeholder="Blood Pressure" name="blood_pressure" tabindex="4" required>
                        </fieldset>
                        <fieldset>
                            <input type="text" placeholder="Blood Glucose" name="blood_glucose" tabindex="4" required>
                        </fieldset>
                        <fieldset>
                            <input type="text" placeholder="Symtoms" name="symtoms" tabindex="4" required>
                        </fieldset>
                        <fieldset>
                            <input type="file" name="file" accept="image/*">
                        </fieldset>

                        {{ Form::hidden('doctor_id', $doctor->id) }}

                        <input type="hidden" name="status" value="0">
                
                        <fieldset class="col-lg-3">
                            <button class="col-lg-3" name="previous" type="submit" id="contact-submit">Previous</button>
                            <button class="col-lg-3" name="submit" type="submit" id="contact-submit">Submit</button>
                        </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
            
        </div>
</section>
@endsection