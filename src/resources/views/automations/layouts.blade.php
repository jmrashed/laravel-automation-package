<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ __('Automation Package') }}</title>

    <!-- CSS only -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <script src="{{ url('/vendor/automation/js/app.js') }}"></script>
    <link href="{{ url('/vendor/automation/css/app.css') }}" rel="stylesheet" />
</head>

<body>


    <div class="container">
        <nav class="nav-side-menu">
            <div class="brand">
                <img src="{{ url('vendor/automation/img/logo.png') }}" alt="">
            </div>
            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
            <div class="menu-list">
                <ul id="menu-content" class="menu-content collapse out">
                    <li>
                        <a href="{{ route('automations.dashboard') }}">
                            <i class="fa fa-fw fa-dashboard fa-lg"></i>Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('automations.env') }}">
                            <i class="fa fa-fw fa-cog fa-lg"></i>.env
                        </a>
                    </li>
                    <li data-toggle="collapse" data-target="#products" class="collapsed" data-parent="#menu-content">
                        <a href="#">
                            <i class="fa fa-fw fa-gift fa-lg"></i>Elements
                            <i class="fa fa-chevron-down"></i>
                        </a>
                        <ul class="sub-menu collapse" id="products">
                            <li class="active"><a href="{{ route('automations.models') }}">Models</a></li>
                            <li class=""><a href="{{ route('automations.migrations') }}">Migrations</a></li>
                        </ul>
                    </li>
                    <li data-toggle="collapse" data-target="#service" class="collapsed" data-parent="#menu-content">
                        <a href="#">
                            <i class="fa fa-fw fa-table fa-lg"></i>Reports
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </li>
                    <ul class="sub-menu collapse" id="service">
                        <li><a href="#">Report 1</a></li>
                        <li><a href="#">Report 2</a></li>
                        <li><a href="#">Report 3</a></li>
                    </ul>
                    <li data-toggle="collapse" data-target="#new" class="collapsed" data-parent="#menu-content">
                        <a href="#">
                            <i class="fa fa-fw fa-users fa-lg"></i>Groups <i class="fa fa-chevron-down"></i>
                        </a>
                    </li>
                    <ul class="sub-menu collapse" id="new">
                        <li><a href="#">New 1</a></li>
                        <li><a href="#">New 2</a></li>
                        <li><a href="#">New 3</a></li>
                    </ul>
                    <li>
                        <a href="#">
                            <i class="fa fa-fw fa-calendar-o fa-lg"></i>Events
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-fw fa-user fa-lg"></i>Profile
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-fw fa-users fa-lg"></i>People
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-fw fa-cog fa-lg"></i>System
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content">
            <div class="row">
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
                <nav class="navbar-right">
                    <ol class="breadcrumb">
                        @yield('breadcumb')
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
