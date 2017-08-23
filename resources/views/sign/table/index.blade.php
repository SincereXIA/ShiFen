@extends('layouts.app')
@section('title')
    点名面板
@endsection


@section('content')
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-align-left"></i> 点名面板
                    <small>Sessions</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <!-- start accordion -->
                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php $i = 0 ?>
                    @foreach($adminGroups as $adminGroup)
                        <?php $i++ ?>
                        <div class="panel">
                            <a class="panel-heading" role="tab" id="{{ 'heading'.(string)$i }}" data-toggle="collapse"
                               data-parent="#accordion" href="#{{ 'collapse'.(string)$i }}" aria-expanded="true"
                               aria-controls="{{ 'collapse'.(string)$i }}">
                                <h4 class="panel-title">{{ $adminGroup->group_name }}</h4>
                            </a>
                            <div id="{{ 'collapse'.(string)$i }}" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="{{ 'heading'.(string)$i }}" aria-expanded="true" style="">
                                <div class="panel-body">
                                    <ul class="list-unstyled scroll-view">
                                        @foreach($allAdminAtGroups[$adminGroup->id] as $adminAtGroup)
                                            <li class="media event">
                                                <div class="media-body">
                                                    <a class="title" href="#"><h4>{{ $adminAtGroup->group_name }}</h4>
                                                    </a>
                                                    <p>
                                                        <a class="btn btn-info btn-lg"
                                                           href="{{ route('sign-table.create',$adminAtGroup->id) }}"><i
                                                                    class="fa fa-pencil"></i> 点名啦</a>
                                                        <a class="btn btn-info btn-lg"
                                                           href="{{ route('sign-table.createFromWifi',$adminAtGroup->id) }}"><i
                                                                    class="fa fa-pencil"></i> 热点数据上传</a>
                                                        <a class="btn btn-success btn-lg"
                                                           href="{{ route('sign-table.groupShow', $adminAtGroup->id) }}"><i
                                                                    class="fa fa-database"></i>
                                                            看历史</a>
                                                    </p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- end of accordion -->


            </div>
        </div>
    </div>
@endsection