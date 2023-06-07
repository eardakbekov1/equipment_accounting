@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('d_parameters.update',$d_parameter->id ?? '') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="d_name_idSelect">Device name:</label>
                    <select id="d_name_idSelect" class="form-select"  name="d_name_id" aria-label="Default select example">
                        <option value="{{$d_parameter->d_name->id ?? ''}}">{{$d_parameter->d_name->name  ?? ''}}</option>
                        @foreach($d_names as $key => $d_name)
                            <option value="{{$d_name->id ?? ''}}">{{$d_name->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nameInput">Device parameter name:</label>
                    <input id="nameInput" type="text" name="name" value="{{ $d_parameter->name  ?? ''}}" class="form-control" placeholder="title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="unit_idSelect">Unit:</label>
                    <select id="unit_idSelect" class="form-select"  name="unit_id" aria-label="Default select example">
                        <option value="{{$d_parameter->unit->id ?? ''}}">{{$d_parameter->unit->name  ?? ''}}</option>
                        @foreach($units as $key => $unit)
                            <option value="{{$unit->id ?? ''}}">{{$unit->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="notesInput">Comment:</label>
                    <input id="notesInput" type="text" name="notes" value="{{ $d_parameter->notes  ?? ''}}" class="form-control" placeholder="notes">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
