@extends('layouts.adminLTEbox')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <h4>The {{ $titles[1] }} description:</h4>
                            </div>
                            <div class="ml-auto">
                                <a class="btn btn-primary" href="{{ route($titles[2].'.index') }}">Back</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <h5>Employee description</h5>
                            <table id="orderOnly" class="table table-bordered table-striped col-10">
                                <thead>
                                <tr>
                                    <th>Characteristic</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><strong>Employee first name:</strong></td>
                                    <td>{{ $employee->first_name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Employee last name:</strong></td>
                                    <td>{{ $employee->last_name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Employee surname:</strong></td>
                                    <td>{{ $employee->surname ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Organization:</strong></td>
                                    <td>{{ $employee->organization->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Position:</strong></td>
                                    <td>{{ $employee->position->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Phone_number:</strong></td>
                                    <td>{{ $employee->phone_number ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Domain username:</strong></td>
                                    <td>{{ $employee->username ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ $employee->email ?? '' }}</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Characteristic</th>
                                    <th>Value</th>
                                </tr>
                                </tfoot>
                            </table>


    <button type="button" class="btn btn-success addEmployee" data-id="{{ $employee->id }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
        </svg>
        Assign devices to the employee
    </button>
    <div class="message"></div>
                                </div>
                                <div class="col-8">
                                    <h5>Employee history</h5>
                                    <table id="example1" class="table table-bordered table-striped col-10">
                                        <thead>
                                        <tr>
                                            <th>Handovered date</th>
                                            <th>Returned back date</th>
                                            <th>Device</th>
                                            <th>Employee</th>
                                            <th>Notes</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($histories as $history)
                                            <tr>
                                                <td>{{ $history->handovered_date ?? '' }}</td>
                                                <td>{{ $history->received_date ?? '' }}</td>
                                                <td>{{ $history->device->d_name->name ?? ''}}&nbsp;|&nbsp;{{$history->device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{$history->device->d_model->name ?? ''}}&nbsp;|&nbsp;{{$history->device->serial_number ?? ''}}</td>
                                                <td>{{ $history->employee->first_name ?? '' }}&nbsp;{{ $history->employee->last_name ?? '' }}</td>
                                                <td>{{ $history->notes ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Handovered date</th>
                                            <th>Returned back date</th>
                                            <th>Device</th>
                                            <th>Employee</th>
                                            <th>Notes</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
    <hr>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Unbind device from device holder</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Assign device to device holder</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table class="table table-bordered devicesTable">
                <thead>
                <tr>
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

                @foreach ($assignedDevices as $assignedDevice)
                    <tr>
                        <td>{{ $assignedDevice->d_name->name ?? ''}}</td>
                        <td>{{ $assignedDevice->d_model->manufacturer->name ?? ''}}&nbsp;|&nbsp;{{ $device->d_model->name ?? ''}}</td>
                        <td>{{ $assignedDevice->serial_number ?? ''}}</td>
                        <td>{{ $assignedDevice->implementer_inventory ?? ''}}</td>
                        <td>{{ $assignedDevice->sponsor_inventory ?? ''}}</td>
                        <td>{{ $assignedDevice->purpose->name ?? ''}}</td>
                        <td>{{ $assignedDevice->location->address ?? ''}}</td>
                        <td>{{ $assignedDevice->condition->name ?? ''}}</td>
                        <td>{{ $assignedDevice->notes ?? ''}}</td>
                        <td>{{ $assignedDevice->status->name ?? ''}}</td>
                        <td>
                            <button type="button" class="btn btn-success toStorage" data-id="{{ $assignedDevice->id ?? ''}}">
                                To storage
                            </button>
                            <div class="message"></div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <table class="table table-bordered devicesTable">
                <thead>
                <tr>
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
                        <td>{{ $device->d_name->name ?? ''}}</td>
                        <td>{{ $device->d_model->manufacturer->name  ?? ''}}&nbsp;|&nbsp;{{ $device->d_model->name ?? ''}}</td>
                        <td>{{ $device->serial_number ?? ''}}</td>
                        <td>{{ $device->implementer_inventory ?? ''}}</td>
                        <td>{{ $device->sponsor_inventory ?? ''}}</td>
                        <td>{{ $device->purpose->name ?? ''}}</td>
                        <td>{{ $device->location->address ?? ''}}</td>
                        <td>{{ $device->condition->name ?? ''}}</td>
                        <td>{{ $device->notes ?? ''}}</td>
                        <td>{{ $device->status->name ?? ''}}</td>
                        <td>
                            <button type="button" class="btn btn-success addDevice" data-id="{{ $device->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                                    <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </button>
                            <div class="message"></div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

{{-----------------------------------------------------------------------------------------------------}}

    <hr>



@endsection

@push('js')
                                <script>

            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('.addDevice').click(function (e) {
                    $(this).prop('disabled', true);
                    let id = $(this).data('id');
                    let eventBtn = $(this);

                    $.ajax({
                        url: '{{route('add.to.cart')}}',
                        type: 'GET',
                        data: {
                            device_id: id
                        },
                        success: function (response) {
                            eventBtn.removeClass('btn-success');
                            eventBtn.addClass('btn-secondary');
                            eventBtn.parent().find('div.message').text(response.result);
                            $('#empAddMessage').show();
                            // $('#empAddMessage').text(response.result);
                        },
                        error: function (xhr, status, error) {
                            eventBtn.prop('disabled', false);
                            // Отобразить сообщение об ошибке
                            eventBtn.parent().find('div.message').text('The error occured: ' + error);
                        }
                    });
                });
            });

            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('.addEmployee').click(function (e) {
                    let eBtn = $(this);
                    $(this).prop('disabled', true);
                    let id = $(this).data('id');

                    $.ajax({
                        url: '{{route('add.employee.to.cart')}}',
                        type: 'GET',
                        data: {
                            employee_id: id
                        },
                        success: function (response) {
                            eBtn.removeClass('btn-success');
                            eBtn.addClass('btn-secondary');
                            eBtn.parent().find('div.message').text(response.result);
                        },
                        error: function (xhr, status, error) {
                            eBtn.prop('disabled', false);
                            // Отобразить сообщение об ошибке
                            eBtn.parent().find('div.message').text('The error occured: ' + error);
                        }
                    });
                });

                $('.toStorage').click(function (e) {
                    $(this).prop('disabled', true);
                    let id = $(this).data('id');
                    let eBtnStorage = $(this);

                    $.ajax({
                        url: '{{route('send.to.storage')}}',
                        method: 'GET',
                        data: {
                            device_id: id,
                            employee_id: '{{$employee->id}}',
                        },
                        success: function (response) {
                            // dataTable.ajax.reload();
                            eBtnStorage.removeClass('btn-success');
                            eBtnStorage.addClass('btn-secondary');
                            eBtnStorage.parent().find('div.message').text(response.result);
                        },
                        error: function (xhr, status, error) {
                            eBtnStorage.prop('disabled', false);
                            // Отобразить сообщение об ошибке
                            eBtnStorage.parent().find('div.message').text('The error occured: ' + error);
                        }
                    });
                });
            });

        </script>

@endpush
