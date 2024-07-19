    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="{{ asset('images/logo.png') }}">
        <title>{{ Session::get('nama') }}</title>

        <!-- css-->
        <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('template/vendor/jquery/jquery-ui.min.css') }}" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap" rel="stylesheet">
        
        <!-- custtom css-->
        <style type="text/css">
            .table {font-size: 13px;}
            .btn {font-size: 12px;}
            .ui-front {z-index: 9999999 !important;}
            .hiddenRow {padding: 0 !important;}
        </style>
        
        @stack('styles')

    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            @if(Auth::check())

            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" style="max-width: 50px;">&nbsp;RSIAFA
                    <div class="sidebar-brand-text mx-2">{{ Session::get('nama') }}</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                @if(Auth::user()->username == 'monitoring')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/laporan_registrasi') }}">
                        <i class="fas fa-file"></i>
                        <span>Laporan Registrasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/laporan_pemeriksaan') }}">
                        <i class="fas fa-file"></i>
                        <span>Laporan Pemeriksaan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/laporan_diagnosa') }}">
                        <i class="fas fa-file"></i>
                        <span>Laporan Diagnosa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/laporan_prosedur') }}">
                        <i class="fas fa-file"></i>
                        <span>Laporan Prosedur</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/laporan_tindakan_dokter') }}">
                        <i class="fas fa-file"></i>
                        <span>Laporan Tindakan Dokter</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/laporan_obat') }}">
                        <i class="fas fa-file"></i>
                        <span>Laporan Obat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/laporan_laboratorium') }}">
                        <i class="fas fa-file"></i>
                        <span>Laporan Laboratorium</span>
                    </a>
                </li>
                @endif
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->
            
            @endif
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        @if(Auth::check())
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                    <img class="img-profile rounded-circle" src="{{ asset('template/img/undraw_profile.svg') }}">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ url('profile') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                    </a>
                                    <a class="dropdown-item" href="">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                        @endif
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        @yield('content')

                        @if(session()->has('message'))
                        <div class="toast-container" style="position: absolute; top: 10px; right: 10px;">
                            <div class="toast fade show">
                                <div class="toast-body bg-info text-light">{{ session()->get('message') }}</div>
                            </div>
                        </div>
                        @endif

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <!-- footer -->
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- javascript-->
        <script src="{{ asset('template/vendor/jquery/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('template/vendor/jquery/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

        <!-- custom javascript-->
        <script type="text/javascript">
            $(document).ready(function() {
                window.setTimeout(function() {
                    $(".toast").fadeTo(500, 0).slideUp(500, function(){
                        $('.toast').toast('show');
                    });
                }, 5000);
            });
        </script>

        @stack('scripts')

    </body>

    </html>