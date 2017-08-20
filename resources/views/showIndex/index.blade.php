<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>拾纷</title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link href='http://cdn.webfont.youziku.com/webfonts/nomal/23640/46724/5986bd23f629d80f1c72ffa9.css' rel='stylesheet' type='text/css' />
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            font-size: 17px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<header>
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">主页</a>
            @else
                <a href="{{ url('/login') }}">登录</a>
                <a href="{{ url('/register') }}">注册</a>
            @endif
        </div>
    @endif
</header>
<main class="full-height flex-center">
    <div class="col-xs-12 text-center center-block">
        <div class="text-center m-b-md" style="font-family:'TSSunOldc5b7c1b725c58';">
            <h1 class="title">拾纷</h1>alpha
        </div>
        <div class="col-xs-10 col-xs-offset-1 links">
            <a class="col-xs-6 col-md-3" href="{{ url('/about') }}">关于拾纷</a>
            <a class="col-xs-6 col-md-3" href="{{ url('/progress') }}">项目进展</a>
            <a class="col-xs-6 col-md-3" href="http://blog.sumblog.cn">作者主页</a>
            <a class="col-xs-6 col-md-3" href="{{ route('messageBoard.index') }}">留言板</a>
        </div>
    </div>
</main>
</body>
</html>