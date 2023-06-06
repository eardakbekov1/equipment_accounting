@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('cities.update',$city->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nameInput">city:</label>
                    <input id="nameInput" type="text" name="name" value="{{ $city->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="district_idInput">district_id:</label>
                    <input id="district_idInput" type="text" name="district_id" value="{{ $city->district_id }}" class="form-control" placeholder="district_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
