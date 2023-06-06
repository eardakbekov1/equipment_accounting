@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('cities.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="nameInput">city:</label>
                    <input id="nameInput" type="text" name="name" class="form-control" placeholder="Type the city name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="district_idInput">district_id:</label>
                    <input id="district_idInput" type="text" name="district_id" class="form-control" placeholder="Choose the district">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

