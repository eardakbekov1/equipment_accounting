@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nameInput">Username:</label>
                    <input id="nameInput" type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="emailInput">E-mail:</label>
                    <input id="emailInput" type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="email">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Type the password" required>
                </div>
                <div class="form-group">
                    <p></p>
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="employee_idSelect">Employee:</label>
                    <select id="employee_idSelect" class="form-select"  name="employee_id" aria-label="Default select example">
                        <option value="{{$user->employee->id ?? ''}}">{{ $user->employee->first_name ?? '' }}&nbsp;{{ $user->employee->last_name ?? '' }}</option>
                        @foreach($employees as $key => $employee)
                            <option value="{{$employee->id ?? ''}}">{{ $employee->first_name ?? '' }}&nbsp;{{ $employee->last_name ?? '' }}</option>
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
