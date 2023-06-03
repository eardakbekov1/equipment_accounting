@extends('layouts.cart')

@section('content')

    <h4>Device holder</h4>

    <table id="cartEmployee" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Surname</th>
            <th>Organization</th>
            <th>Position</th>
            <th>Phone_number</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if($cartEmployees)
            @foreach($cartEmployees as $id => $details)
                <tr data-id="{{ $id }}">
                    <td data-th="First name">{{ $details['first_name'] }}</td>
                    <td data-th="Last name">{{ $details['last_name'] }}</td>
                    <td data-th="Surname">{{ $details['surname'] }}</td>
                    <td data-th="Organization">{{ $details['organization'] }}</td>
                    <td data-th="Position">{{ $details['position'] }}</td>
                    <td data-th="Phone_number">{{ $details['phone_number'] }}</td>
                    <td data-th="Username">{{ $details['username'] }}</td>
                    <td data-th="Email">{{ $details['email'] }}</td>
                    <td class="actions" data-th="Action">
                        <button class="btn btn-danger btn-sm remove-employee-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <h4>Devices</h4>

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th>Device name</th>
            <th>Device Model</th>
            <th>Serial Number</th>
            <th>Implementer Inventory</th>
            <th>Sponsor Inventory</th>
            <th>Purpose</th>
            <th>Location</th>
            <th>Condition</th>
            <th>Notes</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($cartDevices))
            @foreach($cartDevices as $id => $details)
                <tr data-id="{{ $id }}">
                    <td data-th="Device name">{{ $details['d_name'] }}</td>
                    <td data-th="Device Model">{{ $details['manufacturer'] }}&nbsp;|&nbsp;{{ $details['d_model'] }}</td>
                    <td data-th="Serial Number">{{ $details['serial_number'] }}</td>
                    <td data-th="Implementer Inventory">{{ $details['implementer_inventory'] }}</td>
                    <td data-th="Sponsor Inventory">{{ $details['sponsor_inventory'] }}</td>
                    <td data-th="Purpose">{{ $details['purpose'] }}</td>
                    <td data-th="Location">{{ $details['location'] }}</td>
                    <td data-th="Condition">{{ $details['condition'] }}</td>
                    <td data-th="Notes">{{ $details['notes'] }}</td>
                    <td data-th="Status">{{ $details['status'] }}</td>
                    <td class="actions" data-th="Action">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <p></p>
                                <label for="handovered_dateInput">*Handovered date:</label>
                                <input id="handovered_dateInput" type="date" name="handovered_date" class="form-control @error('handovered_date') is-invalid @enderror" value="{{old('handovered_date')}}" placeholder="Choose the handovered_date">
                            </div>
                        </div>
                        <p></p>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <p></p>
                                <label for="notesInput">Notes:</label>
                                <input id="notesInput" type="text" name="notes" class="form-control @error('notes') is-invalid @enderror" value="{{old('notes')}}" placeholder="notes">
                            </div>
                        </div>
{{--                        <p></p>--}}
{{--                        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <p></p>--}}
{{--                                <label for="addressInput">Type the address where the device will locate:</label>--}}
{{--                                <input id="addressInput" type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}" placeholder="Type the address where the device will locate">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <p></p>
                        <button type="submit" class="btn btn-success">Assign devices to user</button>
                    </div>
                </form>
            </td>
            <td>
                <form action="{{ route('clear.box') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-warning">Clear box</button>
                </form>
            </td>
            <td>
                <a href="{{ url('/') }}" class="btn btn-primary">Home</a>
            </td>
        </tr>
        </tfoot>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript">

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            let ele = $(this);

            if(confirm("Are you sure you want to remove device from the box?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

        $(".remove-employee-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure you want to remove device holder from the box?")) {
                $.ajax({
                    url: '{{ route('remove.employee.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>
@endsection
