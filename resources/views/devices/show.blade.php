@extends('layouts.adminLTECreate')

@section('content')
    <div class="row">
    <div class="col-4">
        <h5>Device description</h5>
    <table id="orderOnly" class="table table-bordered table-striped col-10">
        <thead>
        <tr>
            <th>Characteristic</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><strong>Device name:</strong></td>
            <td>{{ $device->d_name->name ?? ''}}</td>
        </tr>
        <tr>
            <td><strong>Device model:</strong></td>
            <td>{{ $device->d_model->name ?? ''}}</td>
        </tr>
        <tr>
            <td><strong>Sponsor inventory number:</strong></td>
            <td>{{ $device->sponsor_inventory  ?? ''}}</td>
        </tr>
        <tr>
            <td><strong>Implementer inventory number:</strong></td>
            <td>{{ $device->unit_id ?? ''}}</td>
        </tr>
        <tr>
            <td><strong>Purpose:</strong></td>
            <td>{{ $device->purpose->name ?? ''}}</td>
        </tr>
        <tr>
            <td><strong>Serial number:</strong></td>
            <td>{{ $device->serial_number ?? ''}}</td>
        </tr>
        <tr>
            <td><strong>Location:</strong></td>
            <td>{{ $device->location->address ?? ''}}</td>
        </tr>
        <tr>
            <td><strong>Condition:</strong></td>
            <td>{{ $device->condition->name ?? ''}}</td>
        </tr>
        <tr>
            <td><strong>Notes:</strong></td>
            <td>{{ $device->notes ?? ''}}</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <th>Characteristic</th>
            <th>Value</th>
        </tr>
        </tfoot>
    </table>
        <table id="example2" class="table table-bordered table-striped col-10">
            <thead>
            <tr>
                <th>Parameter</th>
                <th>Value</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($d_name_d_parameters as $d_parameter)
                <tr>
                    <td>{{ $d_parameter->name ?? ''}}</td>
                    <td>
                        @foreach ($device_d_p_values as $d_p_value)
                            @if ($d_parameter->id == $d_p_value->d_parameter_id)
                                {{ $d_p_value->d_p_value }} {{ $d_p_value->d_parameter->unit->name ?? ''}}
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Parameter</th>
                <th>Value</th>
            </tr>
            </tfoot>
        </table>
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Add parameter
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add new parameter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('device.parameter.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <p></p>
                                <label for="device_idInput"> Device:{{$device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$device->d_model->manufacturer->name ?? ''}}&nbsp;|&nbsp;{{$device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$device->serial_number ?? ''}}</label>
                                <input hidden id="device_idInput" value="{{ $device->id }}" type="number" name="device_id" class="form-control">
                            </div>
                                    <div class="form-group">
                                        <p></p>
                                        <label for="nameInput"><span class="text-danger">*</span> Parameter name:</label>
                                        <input id="nameInput" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Type the name of parameter of device">
                                    </div>
                            <div class="form-group">
                                <p></p>
                                <label for="unitInput">Unit:</label>
                                <input id="unitInput" type="text" name="unit" class="form-control @error('unit') is-invalid @enderror" value="{{old('unit')}}" placeholder="Type the parameter unit">
                            </div>
                                    <div class="form-group">
                                        <p></p>
                                            <label for="d_p_valueInput"><span class="text-danger">*</span> Value:</label>
                                            <input id="d_p_valueInput" type="text" name="d_p_value" class="form-control @error('d_p_value') is-invalid @enderror" value="{{old('d_p_value')}}" placeholder="Type the device new parameter value">
                                    </div>
                                    <div class="form-group">
                                        <p></p>
                                        <label for="notesInput">Comment:</label>
                                        <input id="notesInput" type="text" name="notes" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Type your description of the parameter">
                                    </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-8">
        <h5>Device history</h5>
        <table id="example1" class="table table-bordered table-striped col-10">
            <thead>
            <tr>
                <th>Handovered date</th>
                <th>Returned back date</th>
                <th>Device</th>
                <th>Employee</th>
                <th>Notes</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($histories as $history)
                <tr>
                    <td>{{ $history->handovered_date ?? '' }}</td>
                    <td>{{ $history->received_date ?? '' }}</td>
                    <td>{{ $history->device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$history->device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$history->device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$history->device->serial_number ?? ''}}</td>
                    <td>{{ $history->employee->first_name ?? '' }}&nbsp;{{ $history->employee->last_name ?? '' }}</td>
                    <td>{{ $history->notes ?? '' }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Handovered date</th>
                <th>Returned back date</th>
                <th>Device</th>
                <th>Employee</th>
                <th>Notes</th>
            </tr>
            </tfoot>
        </table>
    </div>
    </div>
@endsection
