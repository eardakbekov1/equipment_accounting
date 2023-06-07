@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('d_p_values.update',$d_p_value->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="device_idSelect"><span class="text-danger">*</span> Device:</label>
                    <select id="device_idSelect" class="form-select"  name="device_id" aria-label="Default select example">
                        <option value="{{$d_p_value->device->id ?? ''}}">{{$d_p_value->device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$d_p_value->device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$d_p_value->device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$d_p_value->device->implementer_inventory ?? ''}}&nbsp;|&nbsp;{{$d_p_value->device->sponsor_inventory ?? ''}}&nbsp;|&nbsp;{{$d_p_value->device->serial_number ?? ''}}</option>
                        @foreach($devices as $device)
                            <option value="{{$device->id ?? ''}}">{{$device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$device->implementer_inventory ?? ''}}&nbsp;|&nbsp;{{$device->sponsor_inventory ?? ''}}&nbsp;|&nbsp;{{$device->serial_number ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-lg-4">
                <div class="form-group">
                    <label for="d_parameter_idSelect"><span class="text-danger">*</span> Additional parameter:</label>
                    <select id="d_parameter_idSelect" class="form-select"  name="d_parameter_id" aria-label="Default select example">
                        <option value="{{$d_p_value->d_parameter_id ?? ''}}">{{$d_p_value->d_parameter->name ?? ''}}</option>
                        @foreach($d_parameters as $d_parameter)
                            <option value="{{$d_parameter->id ?? ''}}">{{ $d_parameter->name ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="d_p_valueInput"><span class="text-danger">*</span> Value:</label>
                    <input id="d_p_valueInput" type="text" name="d_p_value" value="{{ $d_p_value->d_p_value }}" class="form-control" placeholder="device parameter value">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
