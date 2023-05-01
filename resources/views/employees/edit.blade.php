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

    <form action="{{ route('employees.update',$employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="first_nameInput">Employee first name:</label>
                    <input id="first_nameInput" type="text" name="first_name" value="{{ $employee->first_name }}" class="form-control" placeholder="first_name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="last_nameInput">Employee last name:</label>
                    <input id="last_nameInput" type="text" name="last_name" value="{{ $employee->last_name }}" class="form-control" placeholder="last_name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="surnameInput">Employee surname:</label>
                    <input id="surnameInput" type="text" name="surname" value="{{ $employee->surname }}" class="form-control" placeholder="surname">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="organization_idInput">Organization_id:</label>
                    <input id="organization_idInput" type="text" name="organization_id" value="{{ $employee->organization_id }}" class="form-control" placeholder="organization_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="position_idInput">Position_id:</label>
                    <input id="position_idInput" type="text" name="position_id" value="{{ $employee->position_id }}" class="form-control" placeholder="position_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="phone_numberInput">Phone_number:</label>
                    <input id="phone_numberInput" type="text" name="phone_number" value="{{ $employee->phone_number }}" class="form-control" placeholder="phone_number">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="usernameInput">Username:</label>
                    <input id="usernameInput" type="text" name="username" value="{{ $employee->username }}" class="form-control" placeholder="username">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="emailInput">Email:</label>
                    <input id="emailInput" type="text" name="email" value="{{ $employee->email }}" class="form-control" placeholder="email">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="user_idInput">User_id:</label>
                    <input id="user_idInput" type="text" name="user_id" value="{{ $employee->user_id }}" class="form-control" placeholder="user_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
