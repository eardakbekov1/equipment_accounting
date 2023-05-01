@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>New employee creating</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.index') }}">Back</a>
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

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="first_nameInput">Employee first name:</label>
                    <input id="first_nameInput" type="text" name="first_name" class="form-control" placeholder="Type the employee first name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="last_nameInput">Employee last name:</label>
                    <input id="last_nameInput" type="text" name="last_name" class="form-control" placeholder="Type the employee last name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="surnameInput">Employee surname:</label>
                    <input id="surnameInput" type="text" name="surname" class="form-control" placeholder="Type the employee surname">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="organization_idInput">Organization_id:</label>
                    <input id="organization_idInput" type="text" name="organization_id" class="form-control" placeholder="organization_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="position_idInput">Position_id:</label>
                    <input id="position_idInput" type="text" name="position_id" class="form-control" placeholder="position_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="phone_numberInput">Phone_number:</label>
                    <input id="phone_numberInput" type="text" name="phone_number" class="form-control" placeholder="phone_number">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="usernameInput">Username:</label>
                    <input id="usernameInput" type="text" name="username" class="form-control" placeholder="username">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="emailInput">Email:</label>
                    <input id="emailInput" type="text" name="email" class="form-control" placeholder="email">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="user_idInput">Email:</label>
                    <input id="user_idInput" type="text" name="user_id" class="form-control" placeholder="user_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

