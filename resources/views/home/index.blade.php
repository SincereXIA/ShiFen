@extends('layouts.app')
@section('title')
    控制台
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>欢迎
                        <small>Sessions</small>
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="bs-example" data-example-id="simple-jumbotron">
                        <div class="jumbotron">
                            <h1>Hello, {{ $auth->name }}</h1>
                            <p>这里是拾纷Alpha.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>功能
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a class="btn btn-app" href="{{ route('userSignLog') }}">
                        <i class="fa fa-edit"></i> 点名记录
                    </a>
                    <a class="btn btn-app" href="{{ route('sign-excuse.index') }}">
                        <i class="fa fa-file-text"></i> 请假记录
                    </a>
                    <a class="btn btn-app" href="{{ route('sign-excuse.create') }}">
                        <i class="fa fa-pencil"></i> 新建请假
                    </a>
                </div>
            </div>
        </div>
        @if($adminRight)
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>管理面板
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <a class="btn btn-app" href="{{ route('sign-excuse.adminIndex') }}">
                            <i class="fa fa-check-square-o"></i> 审核假条
                        </a>
                        <a class="btn btn-app" href="{{ route('sign-appeal.adminIndex') }}">
                            <i class="fa fa-university"></i> 审核申诉
                        </a>
                        <a class="btn btn-app" href="{{ route('sign-table.index') }}">
                            <i class="fa fa-paper-plane"></i> 点名面板
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>

</div>
@endsection
