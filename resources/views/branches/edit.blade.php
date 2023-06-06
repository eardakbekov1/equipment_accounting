@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('branches.update',$branch->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nameInput">Branch name:</label>
                    <input id="nameInput" type="text" name="name" value="{{ $branch->name }}" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="phone_numberInput">phone_number:</label>
                    <input id="phone_numberInput" type="text" name="phone_number" value="{{ $branch->phone_number }}" class="form-control @error('phone_number') is-invalid @enderror" value="{{old('phone_number')}}" placeholder="phone_number">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="organization_idSelect">Organization:</label>
                    <select id="organization_idSelect" class="form-select"  name="organization_id" aria-label="Choose the organization">
                        <option value="{{$branch->organization->id}}">{{$branch->organization->name}}</option>
                        @foreach($organizations as $key => $organization)
                            <option value="{{$organization->id}}" {{ old('organization_id') == $organization->id ? "selected" : "" }}>{{$organization->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="location_idSelect">Address:</label>
                    <select id="location_idSelect" class="form-select"  name="location_id" aria-label="Choose the address">
                        <option value="{{$branch->location->id}}">{{$branch->location->address}}</option>
                        @foreach($locations as $key => $location)
                            <option value="{{$location->id}}" {{ old('location_id') == $location->id ? "selected" : "" }}>{{$location->address}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
