@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-align-left"></i> 我的请假条
                    <small>Sessions</small>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <!-- start accordion -->
                <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
                    <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne1" data-toggle="collapse"
                           data-parent="#accordion1" href="#collapseOne1" aria-expanded="true"
                           aria-controls="collapseOne">
                            <h4 class="panel-title">审核中的请假条</h4>
                        </a>
                        <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel"
                             aria-labelledby="headingOne" aria-expanded="true" style="">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>请假开始</th>
                                        <th>请假结束</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($checkings) > 0)
                                        @foreach($checkings as $checking)
                                            <?php $i = 0 ?>
                                            <tr>
                                                <th scope="row" style="line-height: 30px">{{ ++$i }}</th>
                                                <td style="line-height: 30px">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $checking->start_at,'PRC')->diffForHumans() }}</td>
                                                <td style="line-height: 30px">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $checking->end_at)->diffForHumans() }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-info"
                                                       href="{{ route('sign-excuse.edit',$checking->id) }}">编辑</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th></th>
                                            <td colspan="3">无</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo1" data-toggle="collapse"
                           data-parent="#accordion1" href="#collapseTwo1" aria-expanded="false"
                           aria-controls="collapseTwo">
                            <h4 class="panel-title">未通过的请假条</h4>
                        </a>
                        <div id="collapseTwo1" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>请假开始</th>
                                        <th>请假结束</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($refuses) > 0)
                                        @foreach($refuses as $refuse)
                                            <?php $i = 0 ?>
                                            <tr>
                                                <th style="line-height: 30px" scope="row">{{ ++$i }}</th>
                                                <td style="line-height: 30px">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $refuse->start_at)->diffForHumans() }}</td>
                                                <td style="line-height: 30px">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $refuse->end_at)->diffForHumans() }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-info"
                                                       href="{{ route('sign-excuse.edit',$refuse->id) }}">编辑</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th></th>
                                            <td colspan="3">无</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse"
                           data-parent="#accordion1" href="#collapseThree1" aria-expanded="false"
                           aria-controls="collapseThree">
                            <h4 class="panel-title">已通过的请假条</h4>
                        </a>
                        <div id="collapseThree1" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>请假开始</th>
                                        <th>请假结束</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($passes) > 0)
                                        @foreach($passes as $passe)
                                            <?php $i = 0 ?>
                                            <tr>
                                                <th style="line-height: 30px" scope="row">{{ ++$i }}</th>
                                                <td style="line-height: 30px">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $passe->start_at)->diffForHumans() }}</td>
                                                <td style="line-height: 30px">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $passe->end_at)->diffForHumans() }}</td>
                                                <td style="line-height: 30px">
                                                    <a class="btn btn-sm btn-info"
                                                       href="{{ route('sign-excuse.edit',$passe->id) }}">编辑</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th></th>
                                            <td colspan="3">无</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of accordion -->
            </div>
        </div>
    </div>
@endsection