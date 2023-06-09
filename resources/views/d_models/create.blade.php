@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('d_models.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="nameInput">Device model:</label>
                    <input id="nameInput" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="Type the device model name">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="manufacturer_idSelect">Manufacturer:</label>
                    <select id="manufacturer_idSelect" class="form-select"  name="manufacturer_id" aria-label="Choose the manufacturer">
                        <option>Choose the manufacturer</option>
                        @foreach($manufacturers as $key => $manufacturer)
                            <option value=" {{$manufacturer->id}} " {{ old('manufacturer_id') == $manufacturer->id ? "selected" : "" }}>{{$manufacturer->name}}</option>
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

