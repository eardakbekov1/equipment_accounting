@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="nameInput">department:</label>
                    <input id="nameInput" type="text" name="name" class="form-control" placeholder="Type the department name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="organization_idInput">organization_id:</label>
                    <input id="organization_idInput" type="text" name="organization_id" class="form-control" placeholder="Choose the organization">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

