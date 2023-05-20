@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Accessory: {{ $a_p_value->accessory_name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('a_p_values.index') }}">Back</a>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Parameter:</strong>
                {{ $a_p_value->a_parameter_name }}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Value:</strong>
                {{ $a_p_value->a_p_value }}
            </div>
        </div>
    </div>
@endsection
