@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('a_parameters.update',$a_parameter->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nameInput">Parameter of accessory:</label>
                    <input id="nameInput" type="text" name="name" value="{{ $a_parameter->name }}" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="notesInput">Notes:</label>
                    <input id="notesInput" type="text" name="notes" value="{{ $a_parameter->notes }}" class="form-control @error('notes') is-invalid @enderror" value="{{old('notes')}}" placeholder="notes">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
