@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ $signEvent->event_name }} 签到情况
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="background: url({{ asset('/image/xidian.jfif') }}) no-repeat 100% 0">
                        <br>
                        <p style="font-weight: bold;font-size: medium">
                            签到详情
                        </p>
                        <hr class="clearfix col-xs-12">
                        <div class="dashboard-widget-content">

                            <ul class="list-unstyled timeline widget">
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                事项名称
                                            </h2>
                                            <div class="byline">
                                                <span>Item name</span>
                                            </div>
                                            <p class="excerpt" style="font-size: medium;font-weight: bold">
                                                {{ $signEvent->event_name }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                时间戳
                                            </h2>
                                            <div class="byline">
                                                <span>Item time</span>
                                            </div>
                                            <p class="excerpt" style="font-size: medium;font-weight: bold">
                                                {{ $signEvent->event_time }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                学生姓名
                                            </h2>
                                            <div class="byline">
                                                Student name
                                            </div>
                                            <p class="excerpt" style="font-size: medium;font-weight: bold">
                                                <?php $user = \App\User::findOrFail($signLog->user_id) ?>
                                                {{ $user->userInfo? $user->userInfo->real_name :$user->name }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                学生学号
                                            </h2>
                                            <div class="byline">
                                                Student ID
                                            </div>
                                            <p class="excerpt" style="font-size: medium;font-weight: bold">
                                                {{ \App\User::findOrFail($signLog->user_id)->student_id }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                组织
                                            </h2>
                                            <div class="byline">
                                                Group
                                            </div>
                                            <p class="excerpt" style="font-size: medium;font-weight: bold">
                                                {{ $signEvent->group->group_name }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                到课状态
                                            </h2>
                                            <div class="byline">
                                                Status
                                            </div>
                                            <p class="excerpt" style="font-size: medium;font-weight: bold">
                                                @if($signLog->status == 'attend')
                                                    <span style="color: #1b7e5a">正常签到</span>
                                                @elseif($signLog->status == 'late')
                                                    <span style="color: #BDB76A">迟到</span>
                                                @elseif($signLog->status == 'off')
                                                    <span style="color: #99876D">已请假</span>
                                                @elseif($signLog->status == 'absent')
                                                    <span style="color: #BF0A10">旷课</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <a onclick="window.history.back()" class="btn btn-lg btn-default">返回</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scrips')
@endsection
