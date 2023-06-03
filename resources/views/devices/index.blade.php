@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="grid text-center">
            <div>
                <h2>Devices</h2>
            </div>
            <div>
                <a class="btn btn-success" href="{{ route('devices.create') }}">Create a new device</a>
            </div>
            <p></p>
        </div>
    </div>

    <table class="table table-bordered" id="devicesTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Device Name</th>
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

        @foreach ($devices as $device)
            <tr>
                <td>{{ ++$i ?? ''}}</td>
                <td>{{ $device->d_name->name ?? ''}}</td>
                <td>{{ $device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{ $device->d_model->name ?? ''}}</td>
                <td>{{ $device->serial_number}}</td>
                <td>{{ $device->implementer_inventory}}</td>
                <td>{{ $device->sponsor_inventory}}</td>
                <td>{{ $device->purpose->name ?? ''}}</td>
                <td>{{ $device->location->address ?? ''}}</td>
                <td>{{ $device->condition->name ?? ''}}</td>
                <td>{{ $device->notes}}</td>
                <td>{{ $device->status->name ?? ''}}</td>
                <td>
                    <form action="{{ route('devices.destroy',$device->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('devices.show',$device->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-display" viewBox="0 0 16 16">
                                <path d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4c0 .667.083 1.167.25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75c.167-.333.25-.833.25-1.5H2s-2 0-2-2V4zm1.398-.855a.758.758 0 0 0-.254.302A1.46 1.46 0 0 0 1 4.01V10c0 .325.078.502.145.602.07.105.17.188.302.254a1.464 1.464 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.758.758 0 0 0 .254-.302 1.464 1.464 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.757.757 0 0 0-.302-.254A1.46 1.46 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145z"/>
                            </svg>
                        </a>

                        <a class="btn btn-primary" href="{{ route('devices.edit',$device->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                            </svg>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

@push('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#devicesTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn-custom',
                        text: 'Copy'
                    },
                    {
                        extend: 'csv',
                        className: 'btn-custom',
                        text: 'CSV'
                    },
                    {
                        extend: 'excel',
                        className: 'btn-custom',
                        text: 'Excel'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-custom',
                        text: 'PDF'
                    },
                    {
                        extend: 'print',
                        className: 'btn-custom',
                        text: 'Print'
                    }
                ]
            } );
            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        });
    </script>
@endpush

