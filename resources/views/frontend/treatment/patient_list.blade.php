@extends('layouts.frontendLayouts.frontend_design')

@section('title', '| Index')
@push('styles')
    <style>
       table {
        margin: auto;
        border-collapse: collapse;
        overflow-x: auto;
        display: block;
        width: fit-content;
        max-width: 100%;
        box-shadow: 0 0 1px 1px rgba(0, 0, 0, .1);
        }

        td, th {
        border: solid rgb(200, 200, 200) 1px;
        padding: .5rem;
        }

        th {
        text-align: left;
        background-color: rgb(190, 220, 250);
        text-transform: uppercase;
        padding-top: 1rem;
        padding-bottom: 1rem;
        border-bottom: rgb(50, 50, 100) solid 2px;
        border-top: none;
        }

        td {
        white-space: nowrap;
        border-bottom: none;
        color: rgb(20, 20, 20);
        }

        td:first-of-type, th:first-of-type {
        border-left: none;
        }

        td:last-of-type, th:last-of-type {
        border-right: none;
        }
    </style>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section bg-light">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient ID</th>
                            <th>Patient Name</th>
                            <th>Doctor Name</th>
                            <th>Doctor Mobile No.</th>
                            <th>Doctor Imo</th>
                            <th>Doctor Skype</th>
                            <th>Doctor Viber</th>
                            <th>Doctor WhatsApp</th>
                            <th>Doctor Email</th>
                            <th>Status</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>                       
                        @foreach ($treatments as $treatment)
                            <tr class="gradeU">
                                @if ($treatment->user_id == auth()->user()->id)
                                    <td>{{$treatment->id}}</td>
                                    <td>{{$treatment->patient->id}}</td>
                                    <td>{{$treatment->patient->name}}</td>
                                    <td>{{$treatment->user->first_name}} {{$treatment->user->last_name}}</td>
                                    <td>{{$treatment->user->phone}}</td>
                                    <td>{{$treatment->user->imo}}</td>
                                    <td>{{$treatment->user->skype}}</td>
                                    <td>{{$treatment->user->viber}}</td>
                                    <td>{{$treatment->user->whatsapp}}</td>
                                    <td>{{$treatment->user->email}}</td>
                                    @if ($treatment->status == '0')
                                        <td> <button class="btn btn-raised btn-warning">pending</button></td>
                                        @elseif($treatment->status == '1')
                                        <td><button class="btn btn-raised btn-success"> complete</button></td>
                                        @elseif($treatment->status == '2')
                                        <td><button class="btn btn-raised btn-danger"> Cancel</button></td>
                                    @endif
                                    <td>
                                        @if ($treatment->status == '1')
                                            <a href="{{url('prescription-download', $treatment->id)}}" class="btn btn-raised btn-success" target="_blank"><i class="fas fa-file-download"></i>Download</a>
                                            @else
                                            <a href="#" class="btn btn-raised btn-danger" target="_blank"><i class="fas fa-file-download"></i>Download</a>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                {{$treatments->links()}}
            </div>
        </div>
    </div>
</section>
@endsection