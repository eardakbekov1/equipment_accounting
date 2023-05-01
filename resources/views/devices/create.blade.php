@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>New device creating</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('devices.index') }}">Back</a>
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

    <form action="{{ route('devices.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="device_nameSelect">Device name:</label>
                    <select id="device_nameSelect" class="form-select"  name="device_name" aria-label="Default select example">
                        @foreach($device_names as $device_name)
                            <option value="{{$device_name->id}}">{{$device_name->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="device_modelSelect">Device model:</label>
                    <select id="device_modelSelect" class="form-select"  name="device_model" aria-label="Default select example">
                        @foreach($device_models as $device_model)
                            <option value="{{$device_model->id}}">{{$device_model->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="sponsor_inventoryInput">sponsor_inventory:</label>
                    <input id="sponsor_inventoryInput" type="text" name="sponsor_inventory" class="form-control" placeholder="sponsor_inventory">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="implementer_inventoryInput">implementer_inventory:</label>
                    <input id="implementer_inventoryInput" type="text" name="implementer_inventory" class="form-control" placeholder="implementer_inventory">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="deviceSelect">Parent Device:</label>
                    <select id="deviceSelect" class="form-select"  name="device" aria-label="Default select example">
                        @foreach($devices as $device)
                            <option value="{{$device->id}}">{{$device->device_name->name}}&nbsp;|&nbsp;{{$device->device_model->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="purpose_idInput">purpose_id:</label>
                    <input id="purpose_idInput" type="text" name="purpose_id" class="form-control" placeholder="purpose_id">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="serial_numberInput">serial_number:</label>
                    <input id="serial_numberInput" type="text" name="serial_number" class="form-control" placeholder="serial_number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="location_idInput">location_id:</label>
                    <input id="location_idInput" type="text" name="location_id" class="form-control" placeholder="location_id">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="condition_idInput">condition_id:</label>
                    <input id="condition_idInput" type="text" name="condition_id" class="form-control" placeholder="condition_id">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="notes">Notes:</label>
                    <input id="notes" type="text" name="notes" class="form-control" placeholder="notes">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

