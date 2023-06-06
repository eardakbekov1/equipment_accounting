@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('positions.update',$position->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nameInput">Position name:</label>
                    <input id="nameInput" type="text" name="name" value="{{ $position->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="department_idInput">Department:</label>
                    <input id="department_idInput" type="text" name="department_id" value="{{ $position->department_id }}" class="form-control" placeholder="department_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
