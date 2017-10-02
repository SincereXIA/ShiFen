@extends('layouts.app')

@section('title')
    个人信息
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>个人信息</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">

                        <ul class="list-unstyled timeline widget">
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            姓名
                                        </h2>
                                        <div class="byline">
                                            <span>name</span>
                                        </div>
                                        <p class="excerpt" style="font-size: medium;font-weight: bold">
                                            {{ $userInfo->real_name }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            邮箱
                                        </h2>
                                        <div class="byline">
                                            <span>E-mail</span>
                                        </div>
                                        <p class="excerpt" style="font-size: medium;font-weight: bold">
                                            {{ $user->email }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            手机号码
                                        </h2>
                                        <div class="byline">
                                            <span>Phone</span>
                                        </div>
                                        <p class="excerpt" style="font-size: medium;font-weight: bold">
                                            {{ $userInfo->phone_number }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            学号
                                        </h2>
                                        <div class="byline">
                                            Student ID
                                        </div>
                                        <p class="excerpt" style="font-size: medium;font-weight: bold">
                                            {{ $user->student_id }}
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
                                            @foreach($user->groups as $group)
                                                {{ $group->group_name }}<br>
                                            @endforeach
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
@endsection