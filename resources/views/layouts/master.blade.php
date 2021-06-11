<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TFM SYSTEM</title>

    <link rel="stylesheet" href="/css/app.css">

</head>
<body class="c-app" id="app">

{{--Sidebar Start--}}

<nav class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <h4 class="c-sidebar-brand-full text-success " alt="Logo">
            <i class="cil-leaf"></i> TFM
        </h4>
        <h4 class="c-sidebar-brand-minimized text-success" alt="Logo"><i class="cil-leaf"></i></h4>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item "><a class="c-sidebar-nav-link" href="/dashboard">
                <i class="c-sidebar-nav-icon cil-speedometer"></i>
                Dashboard</a></li>
        @can('isSuper')
            <li class="c-sidebar-nav-title">Producton</li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/production">
                    <i class="c-sidebar-nav-icon cil-bar-chart"></i>
                    Daily Production</a></li>
        @endcan

        @can('isAdmin')
            <li class="c-sidebar-nav-title">Producton</li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/production">
                    <i class="c-sidebar-nav-icon cil-bar-chart"></i>
                    Daily Production</a></li>
            <li class="c-sidebar-nav-title">Management</li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/pickers">
                    <i class="c-sidebar-nav-icon fa fa-user-cog"></i>
                    Pickers</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/supervisor">
                    <i class="c-sidebar-nav-icon fa fa-user-tie"></i>
                    Supervisors</a></li>
            <li class="c-sidebar-nav-title">Finance</li>
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a
                    class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="c-sidebar-nav-icon cil-money"></i>
                    Farm Payments</a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/salary"><span
                                class="c-sidebar-nav-icon"></span>Salary & Commission</a></li>

                </ul>
            </li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/revenue">
                    <i class="c-sidebar-nav-icon cil-graph"></i>
                    Revenue Outline</a></li>
            <li class="c-sidebar-nav-divider"></li>
        @endcan
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
            data-class="c-sidebar-minimized"></button>

</nav>

{{--Sidebar End--}}

{{--Content Start--}}
<div class="c-wrapper c-fixed-components">
    {{--Topbar Start--}}
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
                data-class="c-sidebar-show">
            <i class="c-icon c-icon-lg cil-menu"></i>
        </button>
        <a class="c-header-brand d-lg-none text-success" href="/dashboard">
            <i class="c-icon c-icon-lg cil-leaf"></i>
        </a>
        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
                data-class="c-sidebar-lg-show" responsive="true">
            <i class="c-icon c-icon-lg cil-menu"></i>
        </button>
        <ul class="c-header-nav ml-auto mr-4">
            <li>Hi, <strong class="text-success">{{ Auth::user()->fname }}</strong></li>
            <li class="c-header-nav-item dropdown">
                <a class="c-header-nav-link" data-toggle="dropdown" href="#"
                   role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="c-avatar">
                        <img class="c-avatar-img" src="/images/avatar.png" alt="User">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right pt-0">
                    <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
                    <a class="dropdown-item" href="/profile">
                        <i class="c-icon mr-2 cil-user text-info"></i>
                        Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="c-icon mr-2 cil-account-logout text-danger"></i>Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </header>

    {{--       Main Content--}}
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">
                    @yield('content')
                </div>
            </div>
        </main>
        <footer class="c-footer">
            <div>Copyrights Reserved © 2021.</div>
            <div class="ml-auto">Powered by&nbsp;<a href="#">TFM Systems</a></div>
        </footer>
    </div>
    {{--    Main Content End--}}

</div>
{{--Content End--}}

<script src="/js/app.js"></script>
</body>
</html>
