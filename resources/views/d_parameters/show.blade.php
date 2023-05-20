@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Additional parameter of the device: {{ $d_parameter->name  ?? ''}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('d_parameters.index') }}">Back</a>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Additional parameter name:</strong>
                {{ $d_parameter->name  ?? ''}}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Comment:</strong>
                {{ $d_parameter->notes  ?? ''}}
            </div>
        </div>
    </div>
@endsection
