@extends('layouts.app')

@section('title')
    初始化用户信息
@endsection

@section('content')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>初始化用户信息</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"
                          action="{{ route('finishUserInfo.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <p class="col-md-3 col-sm-3 col-xs-12">首次使用拾纷，请初始化用户信息</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="real_name">姓名 <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="real_name" type="text" id="real_name" required="required"
                                       readonly="readonly" class="form-control col-md-7 col-xs-12"
                                       value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">学号 <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="student_id" name="student_id" readonly="readonly"
                                       required="required" class="form-control col-md-7 col-xs-12"
                                       value="{{ $user->student_id }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">性别 <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default" data-toggle-class="btn-primary"
                                           data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="male"> &nbsp; 男 &nbsp;
                                    </label>
                                    <label class="btn btn-primary" data-toggle-class="btn-primary"
                                           data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="female"> &nbsp; 女 &nbsp;
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">邮箱 <span
                                        class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" name="email" class="form-control col-md-7 col-xs-12"
                                       required="required" type="text"
                                       value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="control-label col-md-3 col-sm-3 col-xs-12">手机号码 <span
                                        class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="phone_number" name="phone_number" class="form-control col-md-7 col-xs-12"
                                       required="required" type="text" value="{{ old('phone_number') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">设置登录密码 <span
                                        class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password" name="password" class="form-control col-md-7 col-xs-12"
                                       required="required" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="repeat_password" class="control-label col-md-3 col-sm-3 col-xs-12">重复登录密码 <span
                                        class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="repeat_password" name="repeat_password"
                                       class="form-control col-md-7 col-xs-12" required="required" type="password">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="button">Cancel</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection