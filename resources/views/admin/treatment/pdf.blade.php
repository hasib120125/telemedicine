<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/frontend_css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontend_css/font-awesome.min.css')}}">

    <style>
        .header_icon ul li a{
            list-style: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table" style="width:100%">
                    <tr>
                        <th><Span><img src="{{asset('images/frontend_images/logo.png')}}" height="50" width="50" alt=""></Span></th>
                        <th style="text-align:center">
                            <h2>Crescent E-Health Service</h1>
                            <h6>Organiged By</h6>
                            <p>Prescription No. {{$prescription_id}}</p>
                        </th>
                        <th><Span><i class="fa fa-download" aria-hidden="true"></i></Span></th>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <table class="table" style="width:100%">
                    <tr>
                        <th>
                            <h3>{{$doctor_first_name}} {{$doctor_last_name}}</h3>
                            <p>{{$degree}}</p>
                            <p>{{$specialization}}</p>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th style="text-align:right">
                            <h4>{{$user_first_name}} {{$user_last_name}}</h4>
                            <p>{{$area}} {{$thana}} {{$district}} -{{$postal_code}}</p>
                        </th>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered" style="width:100%">
                    <tr>
                        <th>Patient : <Span>{{$patient_name}}</Span></th>
                        <th>Age : <Span>{{$patient_age}}</Span></th>
                        <th>Sex : <Span>{{$patient_gender}}</Span></th>
                        <th>Date : <Span>{{$patient_treatment_time}}</Span></th>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered" style="width:100%">
                    <tr>
                        <td>
                            <h6>History</h6>
                            <p>{{$syntoms}}</p>
                        </td>
                        <td rowspan="4">
                            <h3>Rx. </h3>
                            <p>{!! htmlspecialchars_decode($description) !!}</p>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h6>Physical Findings</h6>
                            <p>Weight: {{$weight}} Height: {{$height}} Temperature: {{$temperature}} Pulse: {{$pulse}} Pressure:{{$pressure}} Glucose:{{$glucose}}</p>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h6>Advice</h6>
                            <p>{{$advice}}</p>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h6>Test</h6>
                            <p>{{$test}}</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <table class="table" style="width:100%">
                    <tr>
                        <td style="text-align: center;">
                            <p>This Prescription Allow for only Registered Doctor</p>
                        </td>
                        <td style="text-align: right;">
                            <img src="{{asset('images/frontend_images/com.png')}}" height="58px" alt="">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-2.2.4.min.js"></script>
</body>
</html>