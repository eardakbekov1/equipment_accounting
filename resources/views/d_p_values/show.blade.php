@extends('layouts.adminLTECreate')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Device name:</strong>
                {{ $d_p_value->device->d_name->name }}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model:</strong>
                {{$d_p_value->device->d_model->manufacturer->name  ?? ''}}&nbsp;{{$d_p_value->device->d_model->name ?? ''}}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Serial number:</strong>
                {{$d_p_value->device->serial_number ?? ''}}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Parameter:</strong>
                {{ $d_p_value->d_name_d_parameter->d_parameter->name}}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Value:</strong>
                {{ $d_p_value->d_p_value }}
            </div>
        </div>
    </div>
@endsection
