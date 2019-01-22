@extends('layouts.adminLayouts.admin_design')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/admin_css/select2.css')}}" />
@endpush
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Treatment</a> <a href="#" class="current">Treatment Create</a> </div>
    </div>
    @if (Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif   
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>TreatMent Description</h5>
                </div>
                <div class="widget-content">
                    {!! Form::open(['route' => ['treatment-save', $treatments->id],'method'=>'POST', 'class' => 'form-horizontal mt-5']) !!}
                    @csrf

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="control-group">
                                <label class="control-label">Add Description</label>
                                <div class="controls">
                                    <textarea name="description" placeholder="Please Add Description" class="form-control" id="summary-ckeditor" style="min-width: 100%"></textarea>
                                </div>              
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="control-group">
                                <label class="control-label">Advice</label>
                                <div class="controls">
                                    <textarea name="advice" placeholder="Please give your advice" class="form-control" style="min-width: 100%"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="control-group">
                                <label class="control-label">Test</label>
                                <div class="controls">
                                    <textarea name="test" placeholder="Please provide test" class="form-control" style="min-width: 100%"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="prescription_id" value="1">

                    <input type="hidden" name="debit" value="0">  

                    <div class="form-actions">
                        <input type="submit" value="Submit" class="btn btn-success pull-right">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('js/admin_js/select2.min.js')}}"></script> 
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script> 
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endpush
