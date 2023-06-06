@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('d_names.update',$d_name->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nameInput">Device name:</label>
                    <input id="nameInput" type="text" name="name" value="{{ $d_name->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="category_idSelect">category:</label>
                    <select id="category_idSelect" class="form-select"  name="category_id" aria-label="Choose the category">
                        <option value="{{$d_name->category->id ?? ''}}">{{$d_name->category->name ?? ''}}</option>
                        @foreach($categories as $key => $category)
                            <option value="{{$category->id}}" {{ old('category_id') == $category->id ? "selected" : "" }}>{{$category->name}}</option>
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
