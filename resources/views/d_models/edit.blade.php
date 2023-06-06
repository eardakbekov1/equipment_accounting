@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('d_models.update',$d_model->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="nameInput">Device model:</label>
                    <input id="nameInput" type="text" name="name" value="{{ $d_model->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="manufacturer_idSelect">manufacturer:</label>
                    <select id="manufacturer_idSelect" class="form-select"  name="manufacturer_id" aria-label="Choose the manufacturer">
                        <option value="{{$d_model->manufacturer->id ?? ''}}">{{$d_model->manufacturer->name ?? ''}}</option>
                        @foreach($manufacturers as $key => $manufacturer)
                            <option value="{{$manufacturer->id}}" {{ old('manufacturer_id') == $manufacturer->id ? "selected" : "" }}>{{$manufacturer->name}}</option>
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
