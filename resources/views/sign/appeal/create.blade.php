@extends('layouts.app')
@section('title')
    申诉
@endsection
@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>申诉
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="background: url({{ asset('/image/xidian.jfif') }}) no-repeat 100% 0">
                        <br>
                        <p style="font-weight: bold;font-size: medium">
                            对点名结果有疑问？填写该表单申诉。
                        </p>
                        <hr class="clearfix col-xs-12">
                        <form class="form-horizontal form-label-left" method="post"
                              action="{{ route('sign-appeal.store',$signLog->id) }}">


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">姓名</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="name" type="text" class="form-control" readonly="readonly"
                                           value="{{  $user->userInfo? $user->userInfo->real_name : $user->name  }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">学号</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="student_id" type="text" class="form-control" readonly="readonly"
                                           value="{{ $user->student_id }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">质疑签到项目</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="question_at" type="text" class="form-control" readonly="readonly"
                                           value="{{ $signLog->signEvent->event_time." ".$signLog->signEvent->event_name }}">
                                    <input name="signLog_id" type="hidden" value="{{ $signLog->id }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">说明 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="reason" class="form-control" rows="3" placeholder="（必填）"></textarea>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    {{ csrf_field() }}
                                    <a class="btn btn-primary" onclick="window.history.back()">返回</a>
                                    <button type="reset" class="btn btn-primary">重置</button>
                                    <button type="submit" class="btn btn-success">提交</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scrips')
@endsection
