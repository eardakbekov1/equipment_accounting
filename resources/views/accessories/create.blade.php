@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>New accessory creating</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('accessories.index') }}">Back</a>
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

    <form action="{{ route('accessories.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="nameInput">Accessory:</label>
                    <input id="nameInput" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Type accessory name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="quantityInput">Quantity:</label>
                    <input id="quantityInput" type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{old('quantity')}}" placeholder="Type quantity">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="notesInput">Notes:</label>
                    <input id="notesInput" type="text" name="notes" class="form-control @error('notes') is-invalid @enderror" value="{{old('notes')}}" placeholder="Notes">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="category_idSelect">Category:</label>
                    <select id="category_idSelect" class="form-select"  name="category_id" aria-label="Choose the category of accessory">
                        <option>Choose the category of accessory</option>
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

