@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>status: {{ $status->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('statuses.index') }}">Back</a>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>status:</strong>
                {{ $status->name }}
            </div>
        </div>
    </div>
@endsection
