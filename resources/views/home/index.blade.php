@extends('layouts.app')

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
                        <small>Sessions</small>
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
