@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>New history creating</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('histories.index') }}">Back</a>
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

    <form action="{{ route('histories.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="handovered_dateInput">handovered_date:</label>
                    <input id="handovered_dateInput" type="text" name="handovered_date" class="form-control" placeholder="Type handovered_date">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="received_dateInput">received_date:</label>
                    <input id="received_dateInput" type="text" name="received_date" class="form-control" placeholder="Type received_date">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="device_idInput">device_id:</label>
                    <input id="device_idInput" type="text" name="device_id" class="form-control" placeholder="device_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="employee_idInput">employee_id:</label>
                    <input id="employee_idInput" type="text" name="employee_id" class="form-control" placeholder="employee_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="notesInput">notes:</label>
                    <input id="notesInput" type="text" name="notes" class="form-control" placeholder="notes">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

