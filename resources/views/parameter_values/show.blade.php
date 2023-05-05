@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>parameter_value: {{ $parameter_value->parameter_value }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('parameter_values.index') }}">Back</a>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>parameter_value:</strong>
                {{ $parameter_value->parameter_value }}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>parameter_device_name_id:</strong>
                {{ $parameter_value->parameter_device_name_id }}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>device_id:</strong>
                {{ $parameter_value->device_id }}
            </div>
        </div>
    </div>
@endsection
