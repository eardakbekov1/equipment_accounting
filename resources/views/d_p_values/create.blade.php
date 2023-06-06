@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('d_p_values.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="device_idSelect">Device:</label>
                    <select id="device_idSelect" class="form-select"  name="device_id" aria-label="Default select example">
                        <option value="">Choose the Device</option>
                        @foreach($devices as $key => $device)
                            <option value="{{$device->id ?? ''}}" {{ old('device_id') == $device->id ? "selected" : "" }}>{{$device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$device->implementer_inventory ?? ''}}&nbsp;|&nbsp;{{$device->sponsor_inventory ?? ''}}&nbsp;|&nbsp;{{$device->serial_number ?? ''}}</option>
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
                        <option value="">Choose the parameter of the device</option>
                        @foreach($d_parameters as $key => $d_parameter)
                            <option value="{{$d_parameter->id ?? ''}}" {{ old('d_parameter_id') == $d_parameter->id ? "selected" : "" }}>{{ $d_parameter->name ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="d_p_valueInput">Value:</label>
                    <input id="d_p_valueInput" type="text" name="d_p_value" class="form-control @error('d_p_value') is-invalid @enderror" value="{{old('d_p_value')}}" placeholder="d_p_value">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

