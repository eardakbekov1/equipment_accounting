@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('histories.update',$history->id ?? '') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="handovered_dateInput">Handovered date:</label>
                    <input id="handovered_dateInput" type="date" name="handovered_date" value="{{ $history->handovered_date  ?? ''}}" class="form-control" placeholder="handovered_date">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="received_dateInput">Received date:</label>
                    <input id="received_dateInput" type="text" name="received_date" value="{{ $history->received_date  ?? ''}}" class="form-control" placeholder="received_date">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="device_idSelect">Device:</label>
                    <select id="device_idSelect" class="form-select"  name="device_id" aria-label="Default select example">
                        <option value="{{$history->device->id ?? ''}}">{{$history->device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$history->device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$history->device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$history->device->serial_number ?? ''}}</option>
                        @foreach($devices as $key => $device)
                            <option value="{{$device->id ?? ''}}" {{ old('device_id') == $device->id ? "selected" : "" }}>{{$device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$device->serial_number ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="employee_idSelect">Employee:</label>
                    <select id="employee_idSelect" class="form-select"  name="employee_id" aria-label="Default select example">
                        <option value="{{$history->employee->id ?? ''}}">{{ $history->employee->first_name ?? '' }}&nbsp;{{ $history->employee->last_name ?? '' }}</option>
                        @foreach($employees as $key => $employee)
                            <option value="{{$employee->id ?? ''}}" {{ old('employee_id') == $employee->id ? "selected" : "" }}>{{ $employee->first_name ?? '' }}&nbsp;{{ $employee->last_name ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="notesInput">Notes:</label>
                    <input id="notesInput" type="text" name="notes" value="{{ $history->notes }}" class="form-control" placeholder="notes">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
