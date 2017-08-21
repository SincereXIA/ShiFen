@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>请假
                            <small>Sessions</small>
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
                            西安电子科技大学请假条<br>（网络存根）
                        </p>
                        <hr class="clearfix col-xs-12">
                        <form class="form-horizontal form-label-left" method="post"
                              action="{{ route('sign-excuse.store') }}">


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">姓名</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="name" type="text" class="form-control" readonly="readonly"
                                           value="{{  $auth->userInfo? $auth->userInfo->real_name : $auth->name  }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">学号</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="student_id" type="text" class="form-control" readonly="readonly"
                                           value="{{ $auth->student_id }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">请假原因 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="reason" class="form-control" rows="3" placeholder="（必填）"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">开始日期</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="start_time" type="datetime-local"
                                           class="form-control has-feedback-left" id=""
                                           value="{{ Carbon\Carbon::now()->format('Y-m-d\TH:i') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">结束日期</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="end_time" type="datetime-local" class="form-control has-feedback-left"
                                           id=""
                                           value="{{ Carbon\Carbon::now()->format('Y-m-d\TH:i') }}">
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    {{ csrf_field() }}
                                    <a href="{{ back() }}" class="btn btn-primary">返回</a>
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
