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

    <form action="{{ route('devices.update',$device->id  ?? '') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="d_nameSelect">Device name:</label>
                    <select id="d_nameSelect" class="form-select"  name="d_name_id" aria-label="Default select example">
                        <option value="{{$device->d_name->id ?? ''}}">{{$device->d_name->name ?? ''}}</option>
                        @foreach($d_names as $key => $d_name)
                            <option value="{{$d_name->id ?? ''}}" {{ old('d_name_id') == $d_name->id ? "selected" : "" }}>{{$d_name->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="d_modelSelect">Device model:</label>
                    <select id="d_modelSelect" class="form-select"  name="d_model_id" aria-label="Default select example">
                        <option value="{{$device->d_model->id ?? ''}}">{{$device->d_model->name ?? ''}}</option>
                        @foreach($d_models as $key => $d_model)
                            <option value="{{$d_model->id ?? ''}}" {{ old('d_model_id') == $d_model->id ? "selected" : "" }}>{{$d_model->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="sponsor_inventoryInput">Sponsor inventory number:</label>
                    <input id="sponsor_inventoryInput" value="{{$device->sponsor_inventory ?? ''}}" type="text" name="sponsor_inventory" class="form-control @error('sponsor_inventory') is-invalid @enderror" value="{{old('sponsor_inventory')}}" placeholder="Type the sponsor inventory number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="implementer_inventoryInput">Implementer inventory number:</label>
                    <input id="implementer_inventoryInput" value="{{$device->implementer_inventory ?? ''}}" type="text" name="implementer_inventory" class="form-control @error('implementer_inventory') is-invalid @enderror" value="{{old('implementer_inventory')}}" placeholder="implementer_inventory">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="parent_idSelect">Associated Device:</label>
                    <select id="parent_idSelect" class="form-select"  name="parent_id" aria-label="Default select example">
                        <option value="{{$device->id ?? ''}}">{{$device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$device->serial_number ?? ''}}</option>
                        @foreach($devices as $key => $device)
                            <option value="{{$device->id ?? ''}}" {{ old('device_id') == $device->id ? "selected" : "" }}>{{$device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$device->serial_number ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="purpose_idSelect">Purpose:</label>
                    <select id="purpose_idSelect" class="form-select"  name="purpose_id" aria-label="Default select example">
                        <option value="{{$device->purpose->id ?? ''}}">{{$device->purpose->name  ?? ''}}</option>
                        @foreach($purposes as $key => $purpose)
                            <option value="{{$purpose->id ?? ''}}" {{ old('purpose_id') == $purpose->id ? "selected" : "" }}>{{$purpose->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="serial_numberInput">Serial number:</label>
                    <input id="serial_numberInput" value="{{$device->serial_number ?? ''}}" type="text" name="serial_number" class="form-control @error('serial_number') is-invalid @enderror" value="{{old('serial_number')}}" placeholder="serial_number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="location_idInput">Location:</label>
                    <select id="location_idSelect" class="form-select"  name="location_id" aria-label="Default select example">
                        <option value="{{$device->location->id  ?? ''}}">{{$device->location->address  ?? ''}}</option>
                        @foreach($locations as $key => $location)
                            <option value="{{$location->id ?? ''}}" {{ old('location_id') == $location->id ? "selected" : "" }}>{{$location->address ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="condition_idInput">Condition:</label>
                    <select id="condition_idSelect" class="form-select"  name="condition_id" aria-label="Default select example">
                        <option value="{{$device->condition->id  ?? ''}}">{{$device->condition->name  ?? ''}}</option>
                        @foreach($conditions as $key => $condition)
                            <option value="{{$condition->id ?? ''}}" {{ old('condition_id') == $condition->id ? "selected" : "" }}>{{$condition->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="notes">Notes:</label>
                    <input id="notes" value="{{$device->notes ?? ''}}" type="text" name="notes" class="form-control @error('notes') is-invalid @enderror" value="{{old('notes')}}" placeholder="notes">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
