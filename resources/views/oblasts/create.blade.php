@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('oblasts.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="nameInput">oblast name:</label>
                    <input id="nameInput" type="text" name="name" class="form-control" placeholder="oblast name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

