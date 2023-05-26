@extends('layouts.authorized')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Username: {{ $user->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                {{ $user->name }}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>E-mail:</strong>
                {{ $user->email }}
            </div>
        </div>
    </div>
    <p></p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee:</strong>
                {{ $user->employee->first_name ?? '' }}&nbsp;{{ $user->employee->last_name ?? '' }}
            </div>
        </div>
    </div>
    <p></p>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Roles</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>
                    @if($user->hasRole($role->name))
                        <button class="btn btn-danger assignRoleButton" id="roleAssignBtn-{{$role->id}}"
                                data-user-id="{{$user->id}}" data-role-id="{{$role->id}}">Unbind role
                        </button>
                    @else
                        <button class="btn btn-primary assignRoleButton" id="roleAssignBtn-{{$role->id}}"
                                data-user-id="{{$user->id}}" data-role-id="{{$role->id}}">Assign role
                        </button>
                    @endif
                    <div class="message"></div>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

@endsection

@push('js')
    <script>

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.assignRoleButton').click(function (e) {
                $(this).prop('disabled', true);
                let userId = $(this).data('user-id');
                let roleId = $(this).data('role-id');
                console.log(roleId);
                $.ajax({
                    url: '{{route('assignRole')}}',
                    type: 'POST',
                    data: {
                        user_id: userId,
                        role_id: roleId
                    },
                    success: function (response) {
                        $(e.target).prop('disabled', false);
                        if($(e.target).hasClass('btn-primary')){
                            $(e.target).removeClass('btn-primary');
                            $(e.target).addClass('btn-danger');
                        } else {
                            $(e.target).addClass('btn-primary');
                            $(e.target).removeClass('btn-danger');
                        }
                        $(e.target).parent().find('div.message').text(response.result);
                        // $('#message-' + $ro).text(response.result);
                    },
                    error: function (xhr, status, error) {
                        $(e.target).prop('disabled', false);
                        // Отобразить сообщение об ошибке
                        $(e.target).parent().find('div.message').text('The error occured: ' + error);
                    }
                });
            });
        });

    </script>
@endpush
