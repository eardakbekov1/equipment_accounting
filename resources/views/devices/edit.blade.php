@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('devices.update',$device->id  ?? '') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="d_nameSelect"><span class="text-danger">*</span> Device name:</label>
                    <select id="d_nameSelect" class="form-select"  name="d_name_id" aria-label="Default select example">
                        <option value="{{$device->d_name->id ?? ''}}">{{$device->d_name->name ?? ''}}</option>
                        @foreach($d_names as $key => $d_name)
                            <option value="{{$d_name->id ?? ''}}">{{$d_name->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="d_modelSelect"><span class="text-danger">*</span> Device model:</label>
                    <select id="d_modelSelect" class="form-select"  name="d_model_id" aria-label="Default select example">
                        <option value="{{$device->d_model->id ?? ''}}">{{$device->d_model->name ?? ''}}</option>
                        @foreach($d_models as $key => $d_model)
                            <option value="{{$d_model->id ?? ''}}">{{$d_model->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="sponsor_inventoryInput"><span class="text-danger">*</span> Sponsor inventory number:</label>
                    <input id="sponsor_inventoryInput" value="{{$device->sponsor_inventory ?? ''}}" type="text" name="sponsor_inventory" class="form-control" placeholder="Type the sponsor inventory number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="implementer_inventoryInput"><span class="text-danger">*</span> Implementer inventory number:</label>
                    <input id="implementer_inventoryInput" value="{{$device->implementer_inventory ?? ''}}" type="text" name="implementer_inventory" class="form-control" placeholder="implementer_inventory">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="parent_idSelect">Associated Device:</label>
                    <select id="parent_idSelect" class="form-select"  name="parent_id" aria-label="Default select example">
                        <option value="{{$device->id ?? ''}}">{{$device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$device->serial_number ?? ''}}</option>
                        @foreach($devices as $key => $deviceItem)
                            <option value="{{$deviceItem->id ?? ''}}">{{$deviceItem->d_name->name ?? ''}}&nbsp;|&nbsp;{{$deviceItem->d_model->manufacturer->name ?? ''}}&nbsp;|&nbsp;{{$deviceItem->d_model->name ?? ''}}&nbsp;|&nbsp;{{$deviceItem->serial_number ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="purpose_idSelect">Purpose:</label>
                    <select id="purpose_idSelect" class="form-select"  name="purpose_id" aria-label="Default select example">
                        <option value="{{$device->purpose->id ?? ''}}">{{$device->purpose->name  ?? ''}}</option>
                        @foreach($purposes as $key => $purpose)
                            <option value="{{$purpose->id ?? ''}}">{{$purpose->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="serial_numberInput"><span class="text-danger">*</span> Serial number:</label>
                    <input id="serial_numberInput" value="{{$device->serial_number ?? ''}}" type="text" name="serial_number" class="form-control" placeholder="serial_number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="addressInput">Locatin address:</label>
                    <input id="addressInput" value="{{$device->location->address ?? ''}}" type="text" name="address" class="form-control" placeholder="address">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="condition_idInput">Condition:</label>
                    <select id="condition_idSelect" class="form-select"  name="condition_id" aria-label="Default select example">
                        <option value="{{$device->condition->id  ?? ''}}">{{$device->condition->name  ?? ''}}</option>
                        @foreach($conditions as $key => $condition)
                            <option value="{{$condition->id ?? ''}}">{{$condition->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="notes">Notes:</label>
                    <input id="notes" value="{{$device->notes ?? ''}}" type="text" name="notes" class="form-control" placeholder="notes">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="status_idInput">Choose the status of the device:</label>
                    <select id="status_idSelect" class="form-select"  name="status_id" aria-label="Default select example">
                        <option value="{{$device->status->id  ?? ''}}">{{$device->status->name  ?? ''}}</option>
                        @foreach($statuses as $key => $status)
                            <option value="{{$status->id ?? ''}}">{{$status->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
