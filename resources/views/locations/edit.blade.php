@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('locations.update',$location->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="city_idSelect">city:</label>
                    <select id="city_idSelect" class="form-select"  name="city_id" aria-label="Choose the city">
                        <option value="{{$location->city->id ?? ''}}">{{$location->city->name ?? ''}}</option>
                        @foreach($cities as $key => $city)
                            <option value="{{$city->id}}" {{ old('city_id') == $city->id ? "selected" : "" }}>{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="addressInput">Address:</label>
                    <input id="addressInput" type="text" name="address" value="{{ $location->address }}" class="form-control" placeholder="address">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
