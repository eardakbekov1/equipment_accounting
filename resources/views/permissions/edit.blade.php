@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('permissions.update',$permission->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nameInput">Permission:</label>
                    <input id="nameInput" type="text" name="name" value="{{ $permission->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
