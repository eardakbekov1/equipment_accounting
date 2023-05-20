@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Change accessory description:</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('accessories.index') }}">back</a>
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

    <form action="{{ route('accessories.update',$accessory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nameInput">Accessory name:</label>
                    <input id="nameInput" type="text" name="name" value="{{ $accessory->name }}" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="quantityInput">Quantity:</label>
                    <input id="quantityInput" type="text" name="quantity" value="{{ $accessory->quantity }}" class="form-control @error('quantity') is-invalid @enderror" value="{{old('quantity')}}" placeholder="quantity">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="notesInput">Notes:</label>
                    <input id="notesInput" type="text" name="notes" value="{{ $accessory->notes }}" class="form-control @error('notes') is-invalid @enderror" value="{{old('notes')}}" placeholder="notes">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="category_idSelect">Category:</label>
                    <select id="category_idSelect" class="form-select"  name="category_id" aria-label="Choose the category of accessory">
                        <option value="{{$accessory->category->id}}">{{ $accessory->category->name }}</option>
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
