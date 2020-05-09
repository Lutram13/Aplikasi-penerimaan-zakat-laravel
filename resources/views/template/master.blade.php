<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Penerimaan Zakat | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="AdminLTE3/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="AdminLTE3/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="AdminLTE3/DataTables/media/css/jquery.dataTables.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="AdminLTE3/DataTables/extensions/RowGroup/css/rowGroup.bootstrap.min.css">
    <!-- Sweetalert2 -->
    <script src="sweetalert2/sweetalert2.min.css"></script>
    @include('sweet::alert')
    
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->        
        @include('template.navbar')

        <!-- Main Sidebar Container -->
        @include('template.sidebar')
        

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('header')</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->            
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            {{-- <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.3
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved. --}}
            <div class="float-right d-none d-sm-block">
                <b>Beta</b> Version
            </div>
            <strong>Create By </strong><a href="">Lutfi Ramadhan</a>
            {{-- <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights --}}
            {{-- reserved. --}}
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="jquery/dist/jquery.min.js"></script>
    {{-- <script src="AdminLTE3/plugins/jquery/jquery.min.js"></script> --}}

    <!-- Bootstrap 4 -->
    <script src="AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="AdminLTE3/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="AdminLTE3/dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="AdminLTE3/DataTables/media/js/jquery.dataTables.min.js"></script>
        <!-- DataTables RowGrouping-->
        <script src="AdminLTE3/DataTables/extensions/RowGroup/js/dataTables.rowGroup.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="sweetalert2/sweetalert2.all.min.js"></script>
    <!-- Editing js -->
    <script src="js/modal.js"></script>
    
    
    @stack('script')
</body>

</html>
