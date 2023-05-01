@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>parameters_device_name</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('parameters_device_names.index') }}">Back</a>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>parameter_id:</strong>
                {{ $parameters_device_name->parameter_id }}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>device_name_id:</strong>
                {{ $parameters_device_name->device_name_id }}
            </div>
        </div>
    </div>
@endsection
