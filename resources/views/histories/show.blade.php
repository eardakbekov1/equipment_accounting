@extends('layouts.adminLTECreate')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Handovered date:</strong>
                {{ $history->handovered_date  ?? ''}}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Received date:</strong>
                {{ $history->received_date  ?? ''}}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Device:</strong>
                {{$history->device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$history->device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$history->device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$history->device->serial_number ?? ''}}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee:</strong>
                {{ $history->employee->first_name ?? '' }}&nbsp;{{ $history->employee->last_name ?? '' }}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Notes:</strong>
                {{ $history->notes }}
            </div>
        </div>
    </div>
@endsection
