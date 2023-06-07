@extends('layouts.adminLTECreate')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Device name:</strong>
                {{ $d_parameter->d_name->name  ?? ''}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Additional parameter name:</strong>
                {{ $d_parameter->name  ?? ''}} {{ $d_parameter->unit->name  ?? ''}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Comment:</strong>
                {{ $d_parameter->notes  ?? ''}}
            </div>
        </div>
    </div>
@endsection
