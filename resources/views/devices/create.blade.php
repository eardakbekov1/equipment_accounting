@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('devices.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="d_nameSelect"><span class="text-danger">*</span> Device name:</label>
                    <select id="d_nameSelect" class="form-select"  name="d_name_id" aria-label="Default select example">
                        <option value="">Choose the type of the device</option>
                        @foreach($d_names as $key => $d_name)
                            <option value="{{$d_name->id ?? ''}}" {{ old('d_name_id') == $d_name->id ? "selected" : "" }}>{{$d_name->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="d_modelSelect"><span class="text-danger">*</span> Device model:</label>
                    <select id="d_modelSelect" class="form-select"  name="d_model_id" aria-label="Default select example">
                        <option value="">Choose the model of the device</option>
                        @foreach($d_models as $key => $d_model)
                            <option value="{{$d_model->id ?? ''}}" {{ old('d_model_id') == $d_model->id ? "selected" : "" }}>{{$d_model->manufacturer->name ?? ''}}&nbsp;|&nbsp;{{$d_model->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="sponsor_inventoryInput"><span class="text-danger">*</span> Sponsor inventory number:</label>
                    <input id="sponsor_inventoryInput" type="text" name="sponsor_inventory" class="form-control @error('sponsor_inventory') is-invalid @enderror" value="{{old('sponsor_inventory')}}" placeholder="Type the sponsor inventory number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="implementer_inventoryInput"><span class="text-danger">*</span> Implementer inventory number:</label>
                    <input id="implementer_inventoryInput" type="text" name="implementer_inventory" class="form-control @error('implementer_inventory') is-invalid @enderror" value="{{old('implementer_inventory')}}" placeholder="implementer_inventory">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="parent_idSelect">Associated Device:</label>
                    <select id="parent_idSelect" class="form-select"  name="parent_id" aria-label="Default select example">
                        <option value="">Choose the Associated Device</option>
                        @foreach($devices as $key => $device)
                            <option value="{{$device->id ?? ''}}" {{ old('device_id') == $device->id ? "selected" : "" }}>{{$device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$device->serial_number ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="purpose_idSelect">Purpose:</label>
                    <select id="purpose_idSelect" class="form-select"  name="purpose_id" aria-label="Default select example">
                        <option value="">Choose the purpose of the device</option>
                        @foreach($purposes as $key => $purpose)
                            <option value="{{$purpose->id ?? ''}}" {{ old('purpose_id') == $purpose->id ? "selected" : "" }}>{{$purpose->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="serial_numberInput"><span class="text-danger">*</span> Serial number:</label>
                    <input id="serial_numberInput" type="text" name="serial_number" class="form-control @error('serial_number') is-invalid @enderror" value="{{old('serial_number')}}" placeholder="serial_number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="addressInput">Location address:</label>
                    <input id="addressInput" type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}" placeholder="address">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="condition_idInput">Condition:</label>
                    <select id="condition_idSelect" class="form-select"  name="condition_id" aria-label="Default select example">
                        <option value="">Choose the condition of the device</option>
                        @foreach($conditions as $key => $condition)
                            <option value="{{$condition->id ?? ''}}" {{ old('condition_id') == $condition->id ? "selected" : "" }}>{{$condition->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="notes">Notes:</label>
                    <input id="notes" type="text" name="notes" class="form-control @error('notes') is-invalid @enderror" value="{{old('notes')}}" placeholder="notes">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="condition_idInput">Status:</label>
                    <select id="condition_idSelect" class="form-select"  name="status_id" aria-label="Default select example">
                        <option value="">Choose the status of the device</option>
                        @foreach($statuses as $key => $status)
                            <option value="{{ $status->id ?? ''}}">{{$status->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

