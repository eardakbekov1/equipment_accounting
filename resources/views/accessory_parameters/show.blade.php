@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Accessory_parameter title: {{ $accessory_parameter->title }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('accessory_parameters.index') }}">Back</a>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>accessory_parameter title:</strong>
                {{ $accessory_parameter->title }}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>accessory_parameter notes:</strong>
                {{ $accessory_parameter->notes }}
            </div>
        </div>
    </div>
@endsection
