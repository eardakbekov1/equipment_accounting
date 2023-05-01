@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Change device description:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('devices.index') }}">back</a>
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

    <form action="{{ route('devices.update',$device->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="device_name_idInput">device_name_id:</label>
                    <input id="device_name_idInput" type="text" name="device_name_id" value="{{ $device->device_name_id }}" class="form-control" placeholder="device_name_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="device_model_idInput">device_model_id:</label>
                    <input id="device_model_idInput" type="text" name="device_model_id" value="{{ $device->device_model_id }}" class="form-control" placeholder="device_model_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="sponsor_inventoryInput">sponsor_inventory:</label>
                    <input id="sponsor_inventoryInput" type="text" name="sponsor_inventory" value="{{ $device->sponsor_inventory }}" class="form-control" placeholder="sponsor_inventory">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="implementer_inventoryInput">implementer_inventory:</label>
                    <input id="implementer_inventoryInput" type="text" name="implementer_inventory" value="{{ $device->implementer_inventory }}" class="form-control" placeholder="implementer_inventory">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="parent_idInput">parent_id:</label>
                    <input id="parent_idInput" type="text" name="parent_id" value="{{ $device->parent_id }}" class="form-control" placeholder="parent_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="purpose_idInput">purpose_id:</label>
                    <input id="purpose_idInput" type="text" name="purpose_id" value="{{ $device->purpose_id }}" class="form-control" placeholder="purpose_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="serial_numberInput">serial_number:</label>
                    <input id="serial_numberInput" type="text" name="serial_number" value="{{ $device->serial_number }}" class="form-control" placeholder="serial_number">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="location_idInput">location_id:</label>
                    <input id="location_idInput" type="text" name="location_id" value="{{ $device->location_id }}" class="form-control" placeholder="location_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="condition_idInput">condition_id:</label>
                    <input id="condition_idInput" type="text" name="condition_id" value="{{ $device->condition_id }}" class="form-control" placeholder="condition_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="notesInput">notes:</label>
                    <input id="notesInput" type="text" name="notes" value="{{ $device->notes }}" class="form-control" placeholder="notes">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
