@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>parameter_value: {{ $accessory_parameters_value->parameter_value }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('accessory_parameters_values.index') }}">Back</a>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>parameter_value:</strong>
                {{ $accessory_parameters_value->parameter_value }}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>accessories_accessory_parameter_id:</strong>
                {{ $accessory_parameters_value->accessories_accessory_parameter_id }}
            </div>
        </div>
    </div>
@endsection
