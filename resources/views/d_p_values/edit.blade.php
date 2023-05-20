@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Change value of the device parameter:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('d_p_values.index') }}">back</a>
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

    <form action="{{ route('d_p_values.update',$d_p_value->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="device_idSelect">Device:</label>
                    <select id="device_idSelect" class="form-select"  name="device_id" aria-label="Default select example">
                        <option value="{{$d_p_value->device->id ?? ''}}">{{$d_p_value->device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$d_p_value->device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$d_p_value->device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$d_p_value->device->implementer_inventory ?? ''}}&nbsp;|&nbsp;{{$d_p_value->device->sponsor_inventory ?? ''}}&nbsp;|&nbsp;{{$d_p_value->device->serial_number ?? ''}}</option>
                        @foreach($devices as $device)
                            <option value="{{$device->id ?? ''}}">{{$device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$device->implementer_inventory ?? ''}}&nbsp;|&nbsp;{{$device->sponsor_inventory ?? ''}}&nbsp;|&nbsp;{{$device->serial_number ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="d_parameter_idSelect">d_parameter:</label>
                    <select id="d_parameter_idSelect" class="form-select"  name="d_parameter_id" aria-label="Default select example">
                        <option value="{{$d_p_value->d_name_d_parameter->d_parameter_id ?? ''}}">{{$d_p_value->d_name_d_parameter->d_parameter->name ?? ''}}</option>
                        @foreach($d_parameters as $d_parameter)
                            <option value="{{$d_parameter->id ?? ''}}">{{ $d_parameter->name ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="d_p_valueInput">d_p_value:</label>
                    <input id="d_p_valueInput" type="text" name="d_p_value" value="{{ $d_p_value->d_p_value }}" class="form-control" placeholder="d_p_value">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
