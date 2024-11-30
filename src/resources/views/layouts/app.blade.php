<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title> </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/skin_color.css')}}">
    @yield('css')

</head>

<body class="hold-transition light-skin sidebar-mini theme-success fixed">

<div class="wrapper">
    <div id="loader"></div>

    <header class="main-header">
        <div class="d-flex align-items-center logo-box justify-content-start">
            <!-- Logo -->
            <a href="index.html" class="logo">
                <!-- logo-->
                <div class="logo-mini w-50">

                </div>

            </a>
        </div>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <div class="app-menu">
                <ul class="header-megamenu nav">
                    <li class="btn-group nav-item">
                        <a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light" data-toggle="push-menu" role="button">
                            <i data-feather="align-left"></i>
                        </a>
                    </li>
                    <li class="btn-group d-lg-inline-flex d-none">
                        <div class="app-menu">
                            <div class="search-bx mx-5">
                                <form>
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit" id="button-addon3"><i data-feather="search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="navbar-custom-menu r-side">
                <ul class="nav navbar-nav">
                    <li class="btn-group nav-item d-lg-inline-flex d-none">
                        <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen btn-warning-light" title="Full Screen">
                            <i data-feather="maximize"></i>
                        </a>
                    </li>


                    <!-- Control Sidebar Toggle Button -->
                    <li class="btn-group nav-item">
                        <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect full-screen waves-light btn-danger-light">
                            <i data-feather="settings"></i>
                        </a>
                    </li>

                    <!-- User Account-->
                    <li class="dropdown user user-menu">

                        <ul class="dropdown-menu animated flipInX">
                            <li class="user-body">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="ti-lock text-muted me-2"></i> Logout</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <!-- sidebar-->
        <section class="sidebar position-relative">
            <div class="help-bt">
                <a href="tel:108" class="d-flex align-items-center">
                    <div class="bg-danger rounded10 h-50 w-50 l-h-50 text-center me-15">
                        <i data-feather="mic"></i>
                    </div>
                    <h4 class="mb-0">PATIENTS RFID SYSTEM</h4>
                </a>
            </div>
            <div class="multinav">
                <div class="multinav-scroll" style="height: 100%;">
                    <!-- sidebar menu-->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="treeview">
                            <a href="#">
                                <i data-feather="monitor"></i>
                                <span>Dashboard</span>
                                <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 1</a></li>
                        </li>
                    </ul>
{{--                        <li>--}}
{{--                            <a href="appointments.html">--}}
{{--                                <i data-feather="calendar"></i>--}}
{{--                                <span>Appointments</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="treeview">
                            <a href="#">
                                <i data-feather="users"></i>
                                <span>Patients</span>
                                <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{route('patients.index')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Patients</a></li>
                                <li><a href="{{route('patients.create')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Patient Details</a></li>
                            </ul>
                        </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="users"></i>
                            <span>Patients Medical Records</span>
                            <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('medical.all')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>View Records</a></li>

                        </ul>
                    </li>
                        <li class="treeview">
                            <a href="#">
                                <i data-feather="activity"></i>
                                <span>Doctors</span>
                                <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{route('doctor.create')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Doctors</a></li>
                            </ul>
                        </li>

                    </ul>

                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="treeview">
                            <a href="#">
                                <i data-feather="monitor"></i>
                                <span>Admin</span>
                                <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{route('admin.view')}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add users</a></li>
                        </li>
                    </ul>


                </div>
            </div>
        </section>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
               @yield('content')
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right d-none d-sm-inline-block">
            <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">FAQ</a>
                </li>

            </ul>
        </div>

    </footer>



    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

@include('sweetalert::alert')




<!-- Page Content overlay -->


<!-- Vendor JS -->
<script src="{{asset('js/vendors.min.js')}}"></script>
<script src="{{asset('js/pages/chat-popup.js')}}"></script>
<script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>

<script src="{{asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
<script src="{{asset('/assets/vendor_components/date-paginator/moment.min.js')}}"></script>
<script src="{{asset('/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/date-paginator/bootstrap-datepaginator.min.js')}}"></script>

<!-- Rhythm Admin App -->
<script src="{{asset('js/template.js')}}"></script>
<script src="{{asset('js/pages/dashboard.js')}}"></script>
@yield('js')
</body>

</html>
