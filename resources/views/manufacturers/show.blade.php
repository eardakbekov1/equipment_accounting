@extends('layouts.adminLTECreate')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Manufacturer:</strong>
                {{ $manufacturer->name }}
            </div>
        </div>
    </div>
@endsection
