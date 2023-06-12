<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Equipment accounting</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('devices.index') }}" class="nav-link">Devices</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('employees.index') }}" class="nav-link">Employees</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        <div class="col">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="{{ url('/') }}" class="brand-link text-decoration-none">
            &nbsp;&nbsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
            </svg>
            <span class="brand-text">&nbsp;&nbsp;IT EA</span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image text-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg>
                </div>
                <div class="info text-light">
                    {{ Auth::user()->name}}
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item menu-close">
                        <a href="#" class="nav-link active">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
                            </svg>
                            <p>
                                &nbsp;&nbsp;IT Equipment
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('devices.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Devices</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('d_names.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Device names</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('conditions.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Conditions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('d_models.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Models</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('d_parameters.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Device parameters</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('d_p_values.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Device parameter values</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('manufacturers.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Manufacturers</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('purposes.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Purposes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('statuses.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Statuses</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('histories.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Histories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('units.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Units</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                            </svg>
                            <p>
                                &nbsp;&nbsp;Employees
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('employees.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Employees</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Roles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('permissions.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Permissions</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            <p>
                                &nbsp;&nbsp;Locations
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('oblasts.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Oblasts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('districts.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Districts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cities.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Cities</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('locations.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Addresses</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                                <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z"/>
                                <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z"/>
                            </svg>
                            <p>
                                &nbsp;&nbsp;Organizations
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('organizations.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Organizations</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('branches.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Branches</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('departments.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Departments</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('positions.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Positions</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plug" viewBox="0 0 16 16">
                                <path d="M6 0a.5.5 0 0 1 .5.5V3h3V.5a.5.5 0 0 1 1 0V3h1a.5.5 0 0 1 .5.5v3A3.5 3.5 0 0 1 8.5 10c-.002.434-.01.845-.04 1.22-.041.514-.126 1.003-.317 1.424a2.083 2.083 0 0 1-.97 1.028C6.725 13.9 6.169 14 5.5 14c-.998 0-1.61.33-1.974.718A1.922 1.922 0 0 0 3 16H2c0-.616.232-1.367.797-1.968C3.374 13.42 4.261 13 5.5 13c.581 0 .962-.088 1.218-.219.241-.123.4-.3.514-.55.121-.266.193-.621.23-1.09.027-.34.035-.718.037-1.141A3.5 3.5 0 0 1 4 6.5v-3a.5.5 0 0 1 .5-.5h1V.5A.5.5 0 0 1 6 0zM5 4v2.5A2.5 2.5 0 0 0 7.5 9h1A2.5 2.5 0 0 0 11 6.5V4H5z"/>
                            </svg>
                            <p>
                                &nbsp;&nbsp;Accessories
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('accessories.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Accessories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('a_parameters.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Accessory parameters</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('a_p_values.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    &nbsp;&nbsp;
                                    <p>Accessory parameters values</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    @if(session('success'))
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </symbol>
                        </svg>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    @if(session('error'))
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </symbol>
                        </svg>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif
                        <div class="alert alert-success d-none">

                        </div>
                    <div class="col-sm-6">
                        <h1>{{ $titles[0] }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route($titles[2].'.index') }}">{{ $titles[0] }}</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-success ml-auto" href="{{ route($titles[2].'.create') }}">
                                    Create a new {{ $titles[1] }}
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">

                                @yield('content')

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2023-2023 Erniz Ardakbekov.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $('#orderOnly').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

@yield('scripts')
@stack('js')

</body>
</html>
