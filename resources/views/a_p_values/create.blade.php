@extends('layouts.adminLTECreate')

@section('content')
    <form action="{{ route('a_p_values.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="accessory_nameSelect">Accessory:</label>
                    <select id="accessory_nameSelect" class="form-select" name="accessory_id" aria-label="Choose the accessory">
                        <option>Choose the accessory</option>
                        @foreach($accessories as $key => $accessory)
                            <option value="{{$accessory->id}}" {{ old('accessory_id') == $accessory->id ? "selected" : "" }}>{{$accessory->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="a_parameter_nameSelect">Choose the parameter of the accessory:</label>
                    <select id="a_parameter_nameSelect" class="form-select"  name="a_parameter_id" aria-label="Choose the accessory">
                        <option>Choose the parameter of the accessory</option>
                        @foreach($a_parameters as  $key => $a_parameter)
                            <option value="{{$a_parameter->id}}" {{ old('a_parameter_id') == $a_parameter->id ? "selected" : "" }}>{{$a_parameter->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p></p>
                    <label for="a_p_valueInput">Value:</label>
                    <input id="a_p_valueInput" type="text" name="a_p_value" class="form-control @error('a_p_value') is-invalid @enderror" value="{{old('a_p_value')}}" placeholder="Type the value of accessory's parameter">
                </div>
            </div>
            <p></p>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

