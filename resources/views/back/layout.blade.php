<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seg-Shop | Dashbord</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Logo Site -->
    <link rel="icon" type="image/svg" sizes="16x16" href="{{ config('public_path()')."/images/icons/s.svg" }}">



    <!-- --------------------------------------------------------------- -->

    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <!-- MDBootstrap Datatables  -->
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">

    <!-- --------------------------------------------------------------- -->
</head>


<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('home') }}" class="nav-link">@lang('Acceuil-Site')</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <form action="{{ route('logout') }}" method="POST" hidden>
                @csrf
                </form>
                <a class="nav-link"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); this.previousElementSibling.submit();">
                    @lang('Déconnexion')
                </a>
            </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                    <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Seg-Dashbord</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin') }}" class="nav-link">
                                <i class="nav-icon fas fa-users "></i>
                                <p>Clients</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('articles') }}" class="nav-link">
                                <i class="nav-icon fas fa-store "></i>
                                <p>Articles </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('commandes') }}" class="nav-link">
                                <i class="nav-icon fas fa-cubes "></i>
                                <p>Commandes </p>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                        </li>

                    </ul>
                    </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-12">
                    @yield('titre')
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
            <div class="container-fluid">
                @yield('main')
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer bg-dark">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 {{ config('app.name') }}.</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap 5 -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"></script>
     <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>

    <!-- My custom scripts (for table pagination) -->
    @yield('myscript')


</body>

</html>
