@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>New accessory_parameters_value creating</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('accessory_parameters_values.index') }}">Back</a>
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

    <form action="{{ route('accessory_parameters_values.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="parameter_valueInput">accessory_parameter_value:</label>
                    <input id="parameter_valueInput" type="text" name="parameter_value" class="form-control" placeholder="parameter_value">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="accessories_accessory_parameter_idInput">accessories_accessory_parameter_id:</label>
                    <input id="accessories_accessory_parameter_idInput" type="text" name="accessories_accessory_parameter_id" class="form-control" placeholder="accessories_accessory_parameter_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

