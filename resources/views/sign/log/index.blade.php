@extends('layouts.app')
@section('title')
    所有点名项
@endsection
@section('css')
    <style type="text/css">
        li[role="presentation"] {
            margin-left: 3px !important;
        }
    </style>
@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-align-left"></i> 点名记录
                    <small>Sessions</small>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist" style="padding-left: 0">
                        <li role="presentation" class="{{ $status=='attend'? 'active': '' }}"><a href="#tab_content1"
                                                                                                 id="attend-tab"
                                                                                                 role="tab"
                                                                                                 data-toggle="tab"
                                                                                                 aria-expanded="{{ $status=='attend'? 'true': 'false' }}">正常</a>
                        </li>
                        <li role="presentation" class="{{ $status=='late'? 'active': '' }}"><a href="#tab_content2"
                                                                                               role="tab" id="late-tab"
                                                                                               data-toggle="tab"
                                                                                               aria-expanded="{{ $status=='late'? 'true': 'false' }}">迟到</a>
                        </li>
                        <li role="presentation" class="{{ $status=='off'? 'active': '' }}"><a href="#tab_content3"
                                                                                              role="tab" id="off-tab"
                                                                                              data-toggle="tab"
                                                                                              aria-expanded="{{ $status=='off'? 'true': 'false' }}">请假</a>
                        </li>
                        <li role="presentation" class="{{ $status=='absent'? 'active': '' }}"><a href="#tab_content4"
                                                                                                 role="tab"
                                                                                                 id="absent-tab"
                                                                                                 data-toggle="tab"
                                                                                                 aria-expanded="{{ $status=='absent'? 'true': 'false' }}">旷课</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade {{ $status=='attend'? 'active in': '' }}"
                             id="tab_content1" aria-labelledby="attend-tab">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>状态</th>
                                    <th>名称</th>
                                    <th>时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($attendSignLogs) > 0)
                                    @foreach($attendSignLogs as $attendSignLog)
                                        <tr>
                                            <th scope="row" style="line-height: 30px">
                                                <button type="button" class="btn btn-success btn-sm">到课</button>
                                            </th>
                                            <td style="line-height: 30px">
                                                {{ $attendSignLog->signEvent->event_name }}
                                            </td>

                                            <td style="line-height: 30px">
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $attendSignLog->signEvent->event_time)->diffForHumans() }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info"
                                                   href="{{ route('signLog.show',$attendSignLog->id) }}">详情</a>
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
                        <div role="tabpanel" class="tab-pane fade {{ $status=='late'? 'active in': '' }}"
                             id="tab_content2" aria-labelledby="late-tab">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>状态</th>
                                    <th>名称</th>
                                    <th>时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($lateSignLogs) > 0)
                                    @foreach($lateSignLogs as $lateSignLog)
                                        <tr>
                                            <th scope="row" style="line-height: 30px">
                                                <button type="button" class="btn btn-warning btn-sm">迟到</button>
                                            </th>
                                            <td style="line-height: 30px">
                                                {{ $lateSignLog->signEvent->event_name }}
                                            </td>
                                            <td style="line-height: 30px">
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lateSignLog->signEvent->event_time)->diffForHumans() }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info"
                                                   href="{{ route('signLog.show',$lateSignLog->id) }}">详情</a>
                                                @if($lateSignLog->signAppeal == null)
                                                    <a class="btn btn-default btn-sm"
                                                       href="{{ route('sign-appeal.create',$lateSignLog->id) }}">质询</a>
                                                @else
                                                    <a class="btn btn-default btn-sm"
                                                       href="{{ route('sign-appeal.show',$lateSignLog->signAppeal->id) }}">查看质询</a>
                                                @endif
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
                        <div role="tabpanel" class="tab-pane fade {{ $status=='off'? 'active in': '' }}"
                             id="tab_content3" aria-labelledby="off-tab">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>状态</th>
                                    <th>名称</th>
                                    <th>时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($offSignLogs) > 0)
                                    @foreach($offSignLogs as $offSignLog)

                                        <tr>
                                            <th scope="row" style="line-height: 30px">
                                                <button type="button" class="btn btn-dark btn-sm">请假</button>
                                            </th>
                                            <td style="line-height: 30px">
                                                {{ $offSignLog->signEvent->event_name }}
                                            </td>
                                            <td style="line-height: 30px">
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $offSignLog->signEvent->event_time)->diffForHumans() }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info"
                                                   href="{{ route('signLog.show',$offSignLog->id) }}">详情</a>
                                                @if($offSignLog->signAppeal == null)
                                                    <a class="btn btn-default btn-sm"
                                                       href="{{ route('sign-appeal.create',$offSignLog->id) }}">质询</a>
                                                @else
                                                    <a class="btn btn-default btn-sm"
                                                       href="{{ route('sign-appeal.show',$offSignLog->signAppeal->id) }}">查看质询</a>
                                                @endif
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
                        <div role="tabpanel" class="tab-pane fade {{ $status=='absent'? 'active in': '' }}"
                             id="tab_content4" aria-labelledby="absent-tab">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>状态</th>
                                    <th>名称</th>
                                    <th>时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($absentSignLogs) > 0)
                                    @foreach($absentSignLogs as $absentSignLog)

                                        <tr>
                                            <th scope="row" style="line-height: 30px">
                                                <button type="button" class="btn btn-danger btn-sm">旷课</button>
                                            </th>
                                            <td style="line-height: 30px">
                                                {{ $absentSignLog->signEvent->event_name }}
                                            </td>
                                            <td style="line-height: 30px">
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $absentSignLog->signEvent->event_time)->diffForHumans() }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info"
                                                   href="{{ route('signLog.show',$absentSignLog->id) }}">详情</a>
                                                @if($absentSignLog->signAppeal == null)
                                                    <a class="btn btn-default btn-sm"
                                                       href="{{ route('sign-appeal.create',$absentSignLog->id) }}">质询</a>
                                                @else
                                                    <a class="btn btn-default btn-sm"
                                                       href="{{ route('sign-appeal.show',$absentSignLog->signAppeal->id) }}">查看质询</a>
                                                @endif
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
        </div>
    </div>
@endsection