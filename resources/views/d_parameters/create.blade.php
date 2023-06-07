@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('d_parameters.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="d_name_idSelect"><span class="text-danger">*</span> Device name:</label>
                    <select id="d_name_idSelect" class="form-select"  name="d_name_id" aria-label="Default select example">
                        <option value="">Choose the device name</option>
                        @foreach($d_names as $key => $d_name)
                            <option value="{{$d_name->id ?? ''}}" {{ old('d_name_id') == $d_name->id ? "selected" : "" }}>{{$d_name->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="nameInput"><span class="text-danger">*</span> Parameter name:</label>
                    <input id="nameInput" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Type the name of parameter of device">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="unit_idSelect">Unit:</label>
                    <select id="unit_idSelect" class="form-select"  name="unit_id" aria-label="Default select example">
                        <option value="">Choose the parameter unit</option>
                        @foreach($units as $key => $unit)
                            <option value="{{$unit->id ?? ''}}" {{ old('unit_id') == $unit->id ? "selected" : "" }}>{{$unit->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="notesInput">Comment:</label>
                    <input id="notesInput" type="text" name="notes" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Type your description of the parameter">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

