@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('d_parameters.update',$d_parameter->id ?? '') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nameInput">Device parameter name:</label>
                    <input id="nameInput" type="text" name="name" value="{{ $d_parameter->name  ?? ''}}" class="form-control" placeholder="title">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="notesInput">Comment:</label>
                    <input id="notesInput" type="text" name="notes" value="{{ $d_parameter->notes  ?? ''}}" class="form-control" placeholder="notes">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
