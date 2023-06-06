@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('d_names.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="nameInput">Device name:</label>
                    <input id="nameInput" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Type the device name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="category_idSelect">Category:</label>
                    <select id="category_idSelect" class="form-select"  name="category_id" aria-label="Choose the category">
                        <option>Choose the category</option>
                        @foreach($categories as $key => $category)
                            <option value=" {{$category->id}} " {{ old('category_id') == $category->id ? "selected" : "" }}>{{$category->name}}</option>
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

