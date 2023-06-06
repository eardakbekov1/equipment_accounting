@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('locations.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="city_idSelect">city:</label>
                    <select id="city_idSelect" class="form-select"  name="city_id" aria-label="Choose the city">
                        <option>Choose the city</option>
                        @foreach($cities as $key => $city)
                            <option value=" {{$city->id}} " {{ old('city_id') == $city->id ? "selected" : "" }}>{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="addressInput">Address:</label>
                    <input id="addressInput" type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}" placeholder="Type the address">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

