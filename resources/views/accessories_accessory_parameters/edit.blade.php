@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Change accessories_accessory_parameter description:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('accessories_accessory_parameters.index') }}">back</a>
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

    <form action="{{ route('accessories_accessory_parameters.update',$accessories_accessory_parameter->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="accessory_idInput">accessory_id:</label>
                    <input id="accessory_idInput" type="text" name="accessory_id" value="{{ $accessories_accessory_parameter->accessory_id }}" class="form-control" placeholder="accessory_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="accessory_parameter_idInput">accessory_parameter_id:</label>
                    <input id="accessory_parameter_idInput" type="text" name="accessory_parameter_id" value="{{ $accessories_accessory_parameter->accessory_parameter_id }}" class="form-control" placeholder="accessory_parameter_id">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
