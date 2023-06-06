@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('districts.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="nameInput">district:</label>
                    <input id="nameInput" type="text" name="name" class="form-control" placeholder="Type the district name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="oblast_idInput">oblast_id:</label>
                    <input id="oblast_idInput" type="text" name="oblast_id" class="form-control" placeholder="Choose the oblast">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

