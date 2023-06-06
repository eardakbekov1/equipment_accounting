@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('districts.update',$district->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nameInput">district:</label>
                    <input id="nameInput" type="text" name="name" value="{{ $district->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="oblast_idInput">oblast_id:</label>
                    <input id="oblast_idInput" type="text" name="oblast_id" value="{{ $district->oblast_id }}" class="form-control" placeholder="oblast_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
