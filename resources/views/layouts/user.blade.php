<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" href="{{ asset('img/logo_web.ico')}}">
<meta name='robots' content='noindex,noarchive' />
<meta name='referrer' content='strict-origin-when-cross-origin' />

<title>@yield('title') - {{ config('app.name') }}</title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/amsify.suggestags.css') }}" rel="stylesheet">
<link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/cropper.css') }}" rel="stylesheet" type="text/css">
@livewireStyles
@yield('inc_style')
<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url" content="{{ url('/') }}">
</head>
<style>
table td {
max-width: 100px;
white-space: nowrap;
text-overflow: ellipsis;
word-break: break-all;
overflow: hidden;
}
.custom-file-label {
    max-width: 100%;
    white-space: nowrap;
    text-overflow: ellipsis;
    word-break: break-all;
    overflow: hidden;
}
</style>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark-black sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user.home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-users-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider" id="app">

    @php
        $user_id_m = DB::table('role_user')->where('user_id', Auth::user()->id)->first();
        $menus = DB::table('menu_users')
            ->join('access_menu_users', 'menu_users.id', '=', 'access_menu_users.menu_id')
            ->where('access_menu_users.role_id', $user_id_m->role_id)
            ->orderBy('access_menu_users.menu_id', 'ASC')
            ->get();
    @endphp


    @foreach ($menus as $m)
    <div class="sidebar-heading">
        {{ $m->menu }}
    </div>

    @php
        $menu = DB::table('sub_menu_users')
            ->join('menu_users', 'sub_menu_users.menu_id', '=', 'menu_users.id')
            ->where('sub_menu_users.menu_id', $m->menu_id)
            ->where('sub_menu_users.is_active', 1)
            ->orderBy('sub_menu_users.title')
            ->get();

        $group = DB::table('menu_users')
            ->join('menu_groups', 'menu_users.id', '=', 'menu_groups.menu_id')
            ->where('menu_groups.menu_id', $m->menu_id)
            ->where('menu_groups.id', '>=', 1)
            ->select(DB::raw('menu_groups.id AS g_id'), 'menu_users.*', DB::raw('menu_groups.icon AS g_icon'), DB::raw('menu_groups.name AS g_name'))
            ->get();
    @endphp

    @foreach ($menu as $sb_menu)
    @if ($sb_menu->group_id == 0)
    <li class="nav-item @if (url()->full() == url($sb_menu->url))active @endif">
        <a class="nav-link pb-0" href="{{ url($sb_menu->url) }}/">
            <i class="fa-fw {{ $sb_menu->icon }}"></i>
            <span>{{ $sb_menu->title }}</span>
        </a>
    </li>
    @endif
    @endforeach

    @foreach ($group as $group_menu)
    @if ($group_menu)
    @php
        $menu_group = DB::table('sub_menu_users')
            ->join('menu_groups', 'sub_menu_users.group_id', '=', 'menu_groups.id')
            ->where('sub_menu_users.group_id', $group_menu->g_id)
            ->where('sub_menu_users.is_active', 1)
            ->orderBy('sub_menu_users.title')
            ->get();
    @endphp
    <li class="nav-item">
        <a class="nav-link pb-0 @foreach ($menu_group as $m_group)@if (url()->full() == url($m_group->url))collapsed @endif @endforeach" href="#" data-toggle="collapse" data-target="#collapse{{ $group_menu->g_id }}" aria-expanded="false" aria-controls="collapse{{ $group_menu->g_id }}">
            <i class="fa-fw {{ $group_menu->g_icon }}"></i>
            <span>{{ $group_menu->g_name }}</span>
        </a>
        <div id="collapse{{ $group_menu->g_id }}" class="collapse @foreach ($menu_group as $m_group)@if (url()->full() == url($m_group->url))show @endif @endforeach" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{ $group_menu->g_name }}</h6>
            @foreach ($menu_group as $m_group)
            <a class="collapse-item @if (url()->full() == url($m_group->url))active @endif" href="{{ url($m_group->url) }}/">{{ $m_group->title }}</a>
            @endforeach
            </div>
        </div>
    </li>
    @endif
    @endforeach

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    @endforeach

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-2 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" style="color: #1d1e20 !important;" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

            <li class="nav-item wk">
                <a class="nav-link text-gray-900" href="{{ url('/') }}">Home<span class="sr-only">(current)</span></a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ Storage::url('user/profile/' . Auth::user()->profile_image) }}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ url('/user/profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/user/edit-profile') }}">
                    <i class="fas fa-user-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                    Edit Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/user/bookmark-anime') }}">
                    <i class="fas fa-bookmark fa-sm fa-fw mr-2 text-gray-400"></i>
                    Bookmark Anime
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                </div>
            </li>

            </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            @yield('content')

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <span>Copyright &copy; {{ config('app.name') }} 2019 - {{ date('Y') }}</span>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/app.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/cropper.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151897549-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-151897549-1');
    </script>
    @livewireScripts
    @yield('inc_script')

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>
</body>
</html>
