@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('employees.update',$employee->id ?? '') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="first_nameInput">* Employee first name:</label>
                    <input id="first_nameInput" class="form-control" value="{{ $employee->first_name ?? '' }}" type="text" name="first_name" placeholder="Type the employee first name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="last_nameInput">* Employee last name:</label>
                    <input id="last_nameInput" class="form-control" value="{{ $employee->last_name ?? '' }}" type="text" name="last_name" placeholder="Type the employee last name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="surnameInput">Employee surname:</label>
                    <input id="surnameInput" class="form-control" value="{{ $employee->surname ?? '' }}" type="text" name="surname" placeholder="Type the employee surname">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="organization_idSelect">Organization:</label>
                    <select id="organization_idSelect" class="form-select"  name="organization_id" aria-label="Default select example">
                        <option value="{{ $employee->organization_id  ?? ''}}">{{ $employee->organization->name  ?? ''}}</option>
                        @foreach($organizations as $key => $organization)
                            <option value="{{$organization->id ?? ''}}">{{$organization->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="position_idSelect">Position:</label>
                    <select id="position_idSelect" class="form-select"  name="position_id" aria-label="Default select example">
                        <option value="{{ $employee->position_id  ?? ''}}">{{ $employee->position->name  ?? ''}}</option>
                        @foreach($positions as $key => $position)
                            <option value="{{$position->id ?? ''}}">{{$position->name ?? ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="phone_numberInput">Phone_number:</label>
                    <input id="phone_numberInput" class="form-control" value="{{ $employee->phone_number ?? '' }}" type="text" name="phone_number" placeholder="phone_number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="usernameInput">Username:</label>
                    <input id="usernameInput" value="{{ $employee->username ?? '' }}" type="text" name="username" class="form-control" placeholder="username">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <p></p>
                    <label for="emailInput">Email:</label>
                    <input id="emailInput" value="{{ $employee->email ?? '' }}" type="text" name="email" class="form-control" placeholder="email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
