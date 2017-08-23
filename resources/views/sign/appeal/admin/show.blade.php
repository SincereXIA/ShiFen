@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <?php
                        $signLog = $signAppeal->signLog;
                        $signEvent = $signLog->signEvent;
                        ?>
                        <h2>对签到项：{{ $signEvent->event_name }} 的申诉
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="background: url({{ asset('/image/xidian.jfif') }}) no-repeat 100% 0">
                        <br>
                        <p style="font-weight: bold;font-size: medium">
                            申诉详情
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
                                                签到状态
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
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                申诉原因
                                            </h2>
                                            <div class="byline">
                                                Group
                                            </div>
                                            <p class="excerpt" style="font-size: medium;font-weight: bold">
                                                {{ $signAppeal->reason }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                申诉状态
                                            </h2>
                                            <div class="byline">
                                                Status
                                            </div>
                                            <p class="excerpt" style="font-size: medium;font-weight: bold">
                                                @if($signAppeal->status == 'ok')
                                                    <span style="color: #1b7e5a">申诉通过</span>
                                                @elseif($signAppeal->status == 'checking')
                                                    <span style="color: #99876D">审核中</span>
                                                @elseif($signAppeal->status == 'refuse')
                                                    <span style="color: #BF0A10">已拒绝</span>
                                                @endif
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
                            </ul>

                        </div>
                        <hr class="clearfix">
                        <div>
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <a class="btn btn-primary" style="display: inline"
                                   onclick="window.history.back()">返回</a>

                                <form method="post" style="display: inline"
                                      action="{{ route('sign-appeal.refuse',$signAppeal->signLog->id) }}">
                                    <input name="id" type="hidden" value="{{ $signAppeal->signLog->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    <button type="submit" class="btn btn-danger" style="display: inline">拒绝</button>
                                </form>

                                <form method="post" style="display: inline"
                                      action="{{ route('sign-appeal.destroy',$signAppeal->signLog->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger" style="display: inline">删除</button>
                                </form>

                                <form method="post" style="display: inline"
                                      action="{{ route('sign-appeal.pass',$signAppeal->signLog->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    <input type="hidden" name="appeal_id" value="{{ $signAppeal->id }}">
                                    <label>通过状态:</label>
                                    <select name="pass_status">
                                        <option value="attend">到课</option>
                                        <option value="late">迟到</option>
                                        <option value="off">请假</option>
                                        <option value="absent">旷课</option>
                                    </select>
                                    <button type="submit" class="btn btn-success" style="display: inline">
                                        通过
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scrips')
@endsection
