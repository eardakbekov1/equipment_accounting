@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>accessories_device</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('accessories_devices.index') }}">Back</a>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>accessory_id:</strong>
                {{ $accessories_device->accessory_id }}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>device_id:</strong>
                {{ $accessories_device->device_id }}
            </div>
        </div>
    </div>
@endsection
