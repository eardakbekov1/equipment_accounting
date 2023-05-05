@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Change parameter_value description:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('parameter_values.index') }}">back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            A problem occurred while processing your request.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('parameter_values.update',$parameter_value->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="parameter_valueInput">parameter_value:</label>
                    <input id="parameter_valueInput" type="text" name="parameter_value" value="{{ $parameter_value->parameter_value }}" class="form-control" placeholder="parameter_value">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="parameter_device_name_idInput">parameter_device_name_id:</label>
                    <input id="parameter_device_name_idInput" type="text" name="parameter_device_name_id" value="{{ $parameter_value->parameter_device_name_id }}" class="form-control" placeholder="parameter_device_name_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="device_idInput">device_id:</label>
                    <input id="device_idInput" type="text" name="device_id" value="{{ $parameter_value->device_id }}" class="form-control" placeholder="device_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
