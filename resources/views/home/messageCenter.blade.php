@extends('layouts.app')
@section('title')
    消息中心
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>消息中心
                            <small>Sessions</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul class="list-unstyled timeline">
                            @foreach($notifications as $notification)
                                <?php
                                $type = "其他通知";
                                if ($notification->type == "App\Notifications\SignEventNotification") {
                                    $type = "签到通知";
                                }

                                ?>
                                <li>
                                    <div class="block">
                                        <div class="tags">
                                            <a href="" class="tag">
                                                <span>{{ $type }}</span>
                                            </a>
                                            <button class="btn btn-info" style="float: left;margin-top: 5px">确认已读
                                            </button>
                                        </div>

                                        <div class="block_content">
                                            <h2 class="title">
                                                <a>{{ $notification->data['title'] }}</a>
                                            </h2>
                                            <div class="byline">
                                                <span>{{ \Carbon\Carbon::createFromTimestamp($notification->data['time'])->diffForHumans() }}</span>
                                                by
                                                <a>{{ \App\User::findOrFail($notification->data['creator'])->name }}</a>
                                            </div>
                                            <p class="excerpt">Film festivals used to be do-or-die moments for movie
                                                makers. They were where you met the producers that could fund your
                                                project, and if the buyers liked your flick, they’d pay to Fast-forward
                                                and… <a>Read&nbsp;More</a>
                                            </p>
                                        </div>

                                    </div>

                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection