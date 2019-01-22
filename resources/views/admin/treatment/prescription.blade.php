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
            <div class="col-sm-12" style="display: contents;">
                <div class="col-sm-2 logo">
                    <img src="{{asset('images/frontend_images/logo.png')}}" height="50" width="50" alt="">
                </div>
                <div class="col-sm-7" style="text-align: center;">
                    <h1>Crescent E-Health Service</h1>
                    <h6>Organiged By</h6>
                    <p>Prescription No. {{$prescription->prescription_id}}</p>
                </div>
                <div class="header_icon col-sm-3" style="text-align: right;font-size: 24px;">
                    <ul style="list-style: none;">
                        <li><a href="{{action('TreatmentController@downloadPDF', $prescription->id)}}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-xs-6">
                <h3>{{$doctors->first_name}} {{$doctors->last_name}}</h3>
                <p>{{$doctors->degree}}</p>
                <p>{{$doctors->specialization}}</p>
            </div>
            <div class="col-sm-6 col-xs-6" style="text-align: right;">
                <h4>{{$users->first_name}} {{$users->last_name}}</h4>
                <p>{{$users->area}} {{$users->thana}} {{$users->district}} -{{$users->postal_code}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered" style="width:100%">
                    <tr>
                        <th>Patient : <Span>{{$prescription->patient->name}}</Span></th>
                        <th>Age : <Span>{{$prescription->patient->age}}</Span></th>
                        <th>Sex : <Span>{{$prescription->patient->gender}}</Span></th>
                        <th>Date : <Span>{{$prescription->treatment_time}}</Span></th>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <h6>History</h6>
                <p>{{$prescription->syntoms}}</p>

                <h6>Physical Findings</h6>
                <p>Weight: {{$prescription->weight}} Height: {{$prescription->height}} Temperature: {{$prescription->temperature}} Pulse: {{$prescription->pulse}} Pressure:{{$prescription->pressure}} Glucose:{{$prescription->glucose}}</p>

                <h6>Advice</h6>
                <p>{{$prescription->advice}}</p>

                <h6>Test</h6>
                <p>{{$prescription->test}}</p>
            </div>
            <div class="col-sm-8">
                <h3>Rx. </h3>
                <p>{!! htmlspecialchars_decode($prescription->description) !!}</p>
            </div>
        </div>

        <div class="row" style="background: #ddd;padding-top: 15px;">
            <div class="col-sm-12" style="display: contents;">
                <div class="col-sm-8" style="text-align: center;">
                    <p>This Prescription Allow for only Registered Doctor</p>
                </div>
                <div class="col-sm-4" style="margin-top: -18px;text-align: right;">
                    <a href="http://linkvisionsoft.com/"><img src="{{asset('images/frontend_images/com.png')}}" height="58px" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-2.2.4.min.js"></script>
</body>
</html>