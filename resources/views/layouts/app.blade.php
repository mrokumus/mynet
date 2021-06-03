<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel | {{ getenv('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Top Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button href="#" class="dropdown-item">
                        <i class="fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    <!-- ./Top Navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="https://img7.mynet.com/mynet-logo.png"
                 alt="Mynet" class="brand-image bg-white elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">{{ getenv('APP_NAME') }}</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    @foreach($menuItems as $key => $firstLevelItem)
                        @if($firstLevelItem->sub_menu_level == 1 )
                            <li class="nav-item {{ request()->segment(2) == $firstLevelItem->slug ? 'menu-open': '' }}">
                                <a href="/dashboard/{{ $firstLevelItem->slug }}"
                                   class="nav-link {{ request()->segment(1) == 'dashboard' AND request()->segment(2) == null ? 'active': ''  }}">
                                    <i class="nav-icon {{ $firstLevelItem->icon }}"></i>
                                    <p>
                                        {{ $firstLevelItem->title }}
                                        <i class="{{ $firstLevelItem->has_sub_menu == 1 ? 'right fas fa-angle-left': '' }}"></i>
                                    </p>
                                </a>
                                @foreach($menuItems as $key => $secondLevelItem)
                                    @if($firstLevelItem->id == $secondLevelItem->sub_menu_id )
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="/dashboard/{{ $secondLevelItem->slug }}"
                                                   class="nav-link {{ request()->segment(2). '/' . request()->segment(3) == $secondLevelItem->slug ? 'active' : '' }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>{{ $secondLevelItem->title }}</p>
                                                </a>
                                            </li>
                                        </ul>
                                    @endif
                                @endforeach
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{ 'CONTENT' }}
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Created with <i class="fa fa-heart" style="color: orangered" aria-hidden="true"></i> by <a
                href="https://github.com/mrokumus" target="_blank">Mr.OKUMUS</a>.
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 1999-{{ \Illuminate\Support\Carbon::now()->format('Y') }}
            <a href="https://mynet.com" target="_blank">Mynet</a>.
        </strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->
<script src=" {{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src=" {{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src=" {{ url('assets/js/adminlte.min.js') }}"></script>
</body>
</html>
