@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('histories.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="handovered_dateInput">Handovered date:</label>
                    <input id="handovered_dateInput" type="date" name="handovered_date" class="form-control @error('handovered_date') is-invalid @enderror" value="{{old('handovered_date')}}" placeholder="Type handovered_date">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="received_dateInput">Received date:</label>
                    <input id="received_dateInput" type="date" name="received_date" class="form-control @error('received_date') is-invalid @enderror" value="{{old('received_date')}}" placeholder="Type received_date">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="device_idSelect">Device:</label>
                    <select id="device_idSelect" class="form-select"  name="device_id" aria-label="Default select example">
                        <option value="">Choose the Associated Device</option>
                        @foreach($devices as $key => $device)
                            <option value="{{$device->id ?? ''}}" {{ old('device_id') == $device->id ? "selected" : "" }}>{{$device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$device->serial_number ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="employee_idSelect">Employee:</label>
                    <select id="employee_idSelect" class="form-select"  name="employee_id" aria-label="Default select example">
                        <option value="">Choose the employee of the device</option>
                        @foreach($employees as $key => $employee)
                            <option value="{{$employee->id ?? ''}}" {{ old('employee_id') == $employee->id ? "selected" : "" }}>{{ $employee->first_name ?? '' }}&nbsp;{{ $employee->last_name ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="notesInput">notes:</label>
                    <input id="notesInput" type="text" name="notes" class="form-control @error('received_date') is-invalid @enderror" value="{{old('received_date')}}" placeholder="notes">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

