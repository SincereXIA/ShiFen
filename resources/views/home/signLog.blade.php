@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-align-left"></i> 概要
                    <small>Sessions</small>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="row">
                    <?php $totalTimes = $attendTimes + $lateTimes + $offTimes + $absentTimes ?>
                    <p>
                        总点名次数：{{ $totalTimes }}
                    </p>
                    <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                        <a class="tile-stats" style="background-color: #DDF0ED"
                           href="{{ route('signLog.index','attend') }}">
                            <div class="icon"><i class="fa fa-check-square-o"></i>
                            </div>
                            <div class="count">{{ $attendTimes }}</div>

                            <h3>签到次数</h3>
                            <p>你累计签到了{{ $attendTimes }}次，点击查看详情</p>
                        </a>
                    </div>
                    <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                        <a class="tile-stats" style="background-color: #E4F4F5"
                           href="{{ route('signLog.index','late') }}">
                            <div class="icon"><i class="fa fa-check-square-o"></i>
                            </div>
                            <div class="count">{{ $lateTimes }}</div>

                            <h3>迟到次数</h3>
                            <p>你累计迟到了{{ $lateTimes }}次，点击查看详情</p>
                        </a>
                    </div>
                    <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                        <a class="tile-stats" style="background-color: #F5FFFB"
                           href="{{ route('signLog.index','off') }}">
                            <div class="icon"><i class="fa fa-check-square-o"></i>
                            </div>
                            <div class="count">{{ $offTimes }}</div>

                            <h3>请假次数</h3>
                            <p>你累计请假了{{ $offTimes }}次，点击查看详情</p>
                        </a>
                    </div>
                    <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
                        <a class="tile-stats" href="{{ route('signLog.index','absent') }}">
                            <div class="icon"><i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <div class="count">{{ $absentTimes }}</div>

                            <h3>旷课次数</h3>
                            <p>你累计旷掉了{{ $absentTimes }}次课，点击查看详情</p>
                        </a>
                    </div>
                </div>
                @if($totalTimes)
                    <p>
                        个人到课率：{{ round(($attendTimes+$lateTimes+$offTimes)/$totalTimes*100,2) }}%
                    </p>
                @endif
                <a href="{{ route('signLog.index','attend') }}" class="btn btn-lg btn-info">查看所有点名数据</a>

            </div>
        </div>

    </div>
@endsection
