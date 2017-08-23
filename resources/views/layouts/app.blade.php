<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>@yield('title') - 拾纷</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- PNotify -->
    <link href="{{ asset('/vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendors/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?12f589ed27a21c73fbd56210da5394a3";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    @yield('css')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ asset('/') }}" class="site_title"><i class="glyphicon glyphicon-th-large"
                                                                     style="border: 0;"></i> <span>拾纷Alpha</span></a>
                </div>

                <div class="clearfix"></div>


                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>用户面板</h3>
                        <ul class="nav side-menu">
                            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> 功能面板 </a>
                            </li>
                            <li><a href="{{ route('userSignLog') }}"><i class="fa fa-edit"></i> 点名记录 </a>
                            </li>
                            <li><a href="{{ route('sign-excuse.index') }}"><i class="fa fa-file-text"></i> 请假记录 </a>
                            </li>
                            <li><a href="{{ route('sign-excuse.create') }}"><i class="fa fa-pencil"></i> 新建请假 </a>
                            </li>
                        </ul>
                    </div>
                    @if(Auth::check()&&Auth::user()->adminGroups->count()>0)
                        <div class="menu_section">
                            <h3>管理面板</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{ route('sign-excuse.adminIndex') }}"><i class="fa fa-check-square-o"></i>
                                        审核假条 </a>
                                </li>
                                <li><a href="{{ route('sign-appeal.adminIndex') }}"><i class="fa fa-university"></i>
                                        审核申诉 </a>
                                </li>
                                <li><a href="{{ route('sign-table.index') }}"><i class="fa fa-paper-plane"></i> 点名面板
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu" style="background-color: white">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::check())
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif


                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">


                @yield('content')
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            @yield('footer')
            <div class="clearfix" style="text-align: center">Copyright © 2017 SincereXIA, XDU Univ.</div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
<!-- PNotify -->
<script src="{{ asset('/vendors/pnotify/dist/pnotify.js') }}"></script>
<script src="{{ asset('/vendors/pnotify/dist/pnotify.buttons.js') }}"></script>
<script src="{{ asset('/vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('/vendors/iCheck/icheck.min.js') }}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('build/js/custom.min.js') }}"></script>
@yield('js')

@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script type="application/javascript">
            new PNotify({
                title: '警告',
                text: '{{ $error }}',
                type: 'error',
                styling: 'bootstrap3'
            });
        </script>
    @endforeach
@endif

@if (defined('info'))
    @foreach ($info as $inf)
        <script type="application/javascript">
            new PNotify({
                title: '通知',
                text: '{{ $inf }}',
                type: 'info',
                styling: 'bootstrap3'
            });
        </script>
    @endforeach
@endif

@if (Session::has('flash_info'))
    <script type="application/javascript">
        new PNotify({
            title: '通知',
            text: '{{ Session::get('flash_info') }}',
            type: 'info',
            styling: 'bootstrap3'
        });
    </script>
@endif
</body>
</html>