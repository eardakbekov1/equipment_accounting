@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>branch_department</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('branch_departments.index') }}">Back</a>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>branch_id:</strong>
                {{ $branch_department->branch_id }}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>department_id:</strong>
                {{ $branch_department->department_id }}
            </div>
        </div>
    </div>
@endsection
