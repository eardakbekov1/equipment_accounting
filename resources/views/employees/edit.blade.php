@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Change employee description:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.index') }}">back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            A problem occurred while processing your request.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.update',$employee->id ?? '') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="first_nameInput">Employee first name:</label>
                    <input id="first_nameInput" class="form-control" value="{{ $employee->first_name ?? '' }}" type="text" name="first_name" placeholder="Type the employee first name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="last_nameInput">Employee last name:</label>
                    <input id="last_nameInput" class="form-control" value="{{ $employee->last_name ?? '' }}" type="text" name="last_name" placeholder="Type the employee last name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="surnameInput">Employee surname:</label>
                    <input id="surnameInput" class="form-control" value="{{ $employee->surname ?? '' }}" type="text" name="surname" placeholder="Type the employee surname">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
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
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
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
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="phone_numberInput">Phone_number:</label>
                    <input id="phone_numberInput" class="form-control" value="{{ $employee->phone_number ?? '' }}" type="text" name="phone_number" placeholder="phone_number">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="usernameInput">Username:</label>
                    <input id="usernameInput" value="{{ $employee->username ?? '' }}" type="text" name="username" class="form-control" placeholder="username">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="emailInput">Email:</label>
                    <input id="emailInput" value="{{ $employee->email ?? '' }}" type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="email">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
