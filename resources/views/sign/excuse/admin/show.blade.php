@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ \App\User::findOrFail($excuse->user_id)->userInfo? \App\User::findOrFail($excuse->user_id)->userInfo->real_name : \App\User::findOrFail($excuse->user_id)->name }}
                            的请假
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
                              action="{{ route('sign-excuse.refuse',$excuse->id) }}">
                            {{ method_field('PATCH') }}


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">姓名</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="name" type="text" class="form-control" readonly="readonly"
                                           value="{{ \App\User::findOrFail($excuse->user_id)->userInfo? \App\User::findOrFail($excuse->user_id)->userInfo->real_name : \App\User::findOrFail($excuse->user_id)->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">学号</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="student_id" type="text" class="form-control" readonly="readonly"
                                           value="{{ \App\User::findOrFail($excuse->user_id)->student_id }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">请假原因 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="reason" class="form-control" rows="3"
                                              readonly="readonly">{{ $excuse->reason }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">开始日期</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="start_at" type="" readonly="readonly"
                                           class="form-control has-feedback-left" id=""
                                           value="{{ $excuse->start_at }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">结束日期</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="end_at" type="" readonly="readonly"
                                           class="form-control has-feedback-left" id=""
                                           value="{{ $excuse->end_at }}">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" href="{{ back() }}">返回</a>
                                    <a class="btn btn-primary" href="{{ route('sign-excuse.edit',$excuse->id) }}">编辑</a>
                                    <input name="id" type="hidden" value="{{ $excuse->id }}">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">拒绝</button>
                                    <form method="post" style="display: inline"
                                          action="{{ route('sign-excuse.pass',$excuse->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <button type="submit" class="btn btn-success">
                                            通过
                                        </button>
                                    </form>
                                    <form method="post" style="display: inline"
                                          action="{{ route('sign-excuse.destroy',$excuse->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">删除</button>
                                    </form>
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
