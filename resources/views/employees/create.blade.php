@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="first_nameInput"><span class="text-danger">*</span> Employee first name:</label>
                    <input id="first_nameInput" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{old('first_name')}}" placeholder="Type the employee first name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="last_nameInput"><span class="text-danger">*</span> Employee last name:</label>
                    <input id="last_nameInput" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{old('last_name')}}" placeholder="Type the employee last name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="surnameInput">Employee surname:</label>
                    <input id="surnameInput" type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" value="{{old('surname')}}" placeholder="Type the employee surname">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="organization_idSelect">Organization:</label>
                    <select id="organization_idSelect" class="form-select"  name="organization_id" aria-label="Default select example">
                        <option value="">Choose the organization</option>
                        @foreach($organizations as $key => $organization)
                            <option value="{{$organization->id ?? ''}}" {{ old('organization_id') == $organization->id ? "selected" : "" }}>{{$organization->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="position_idSelect">Position:</label>
                    <select id="position_idSelect" class="form-select"  name="position_id" aria-label="Default select example">
                        <option value="">Choose the position</option>
                        @foreach($positions as $key => $position)
                            <option value="{{$position->id ?? ''}}" {{ old('position_id') == $position->id ? "selected" : "" }}>{{$position->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="phone_numberInput">Phone_number:</label>
                    <input id="phone_numberInput" type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{old('phone_number')}}" placeholder="phone_number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="usernameInput">Username:</label>
                    <input id="usernameInput" type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}" placeholder="username">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="emailInput">Email:</label>
                    <input id="emailInput" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="email">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

