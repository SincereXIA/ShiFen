@extends('layouts.app2')

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
                    <div class="x_content">
                        <br>
                        <form class="form-horizontal form-label-left" method="post"
                              action="{{ route('sign-excuse.store') }}">


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">姓名</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="name" type="text" class="form-control" readonly="readonly"
                                           value="{{ $auth->userInfo->real_name }}">
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
                                    <textarea name="reason" class="form-control" rows="3" placeholder="请假原因"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">开始日期</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="start_time" type="datetime-local"
                                           class="form-control has-feedback-left" id=""
                                           value="{{ Carbon\Carbon::now() }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">结束日期</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="end_time" type="datetime-local" class="form-control has-feedback-left"
                                           id=""
                                           value="{{ Carbon\Carbon::now() }}">
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    {{ csrf_field() }}
                                    <button type="button" class="btn btn-primary">Cancel</button>
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    {{ Carbon\Carbon::now() }}
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
