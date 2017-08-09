
<!doctype html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <!-- Set charset to UTF-8 -->
    <meta charset="utf-8" />

    <!-- Make IE use the latest document compability -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- Title of your website goes here -->
    <title>拾纷 - @yield('title')</title>

    <!-- Your website's description for SEO -->
    <meta name="description" content="" />

    <!-- Makes your website stretch full width on a mobile device -->
    <meta name="viewport" content="width=device-width" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <!-- CSS styles -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body style="background-color: white">

<!-- These two tags are needed for the sticky footer -->
<div id="wrap1">
    <div id="wrap2">

        <header>
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container">
            <div id="intro">
                <!-- A header -->
                <h2>
                    拾纷正在建设...
                </h2>
                <!-- Some inroduction text. Let the users know what your website is about -->
                <p>
                    <div class="lead">
                        <br>拾纷旨在提供班级互联、通知发布、登记投票、签到请假、资源整合等功能。<br><br>
                        拾纷-时纷-记忆留存<br><br>
                        拾纷是作者的第一个php项目，采用MVC框架敏捷开发，我们仍在学习<br><br>
                        <a href="{{ route('progress.index') }}">项目进度：</a>
                    </div>
                </p>
            </div>

            <div id="progress" class="progressbar">
                <div class="progress" data-progress="20%"><span>20%</span></div>
            </div>

            <div class="col-xs-12 text-center">
                <div class="lead" style="font-size: smaller">
                    项目地址：<a href="http://www.sumblog.cn">http://www.sumblog.cn</a><br>
                    项目构建：诚夏 SincereXIA<br>
                    前端设计：诚夏 SincereXIA<br>
                    后端开发：诚夏 SincereXIA<br>
                    服务运维：诚夏 SincereXIA<br>
                    XDU Univ.
                </div>
            </div>
        </div><!-- end .container -->

        <hr class="divider-top" />

    </div><!-- end #wrap2 -->
</div><!-- end #wrap1 -->

<footer>
</footer>

<!-- Scripts and stuff -->
<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script>window.jQuery || document.write('<script src="assets/js/jquery-1.8.1.min.js"><\/script>')</script>


<script src="{{ asset('js/app.js') }}"></script>
<script src="assets/js/jquery.countdown.min.js"></script>
<script src="assets/js/jquery.easing.1.3.js"></script>
<script src="assets/js/custom.js"></script>


</body>
</html>