@extends('layouts.app')
@section('title')
    导入热点点名数据
@endsection
@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h1>导入 热点点名 数据
                        </h1>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="background: url({{ asset('/image/xidian.jfif') }}) no-repeat 100% 0">
                        <br>
                        <p style="font-weight: bold;font-size: medium">
                            为组织：{{ $group->group_name }}导入热点点名数据<br>
                            需要配合热点点名使用
                        </p>
                        <hr class="clearfix col-xs-12">
                        <form class="form-horizontal form-label-left" method="post"
                              action="{{ route('sign-table.storeFromWifi') }}" enctype="multipart/form-data">
                            <div class="input-group">
                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-info">点名事项</button>
                                          </span>
                                <input name="event_name" placeholder="e.g. 晚点名" type="text" class="form-control">
                            </div>

                            <input name="censor_id" type="hidden" value="{{ Auth::id() }}">
                            <input name="group_id" type="hidden" value="{{ $group->id }}">
                            <p>点名
                                by {{ Auth::user()->userInfo? Auth::user()->userInfo->real_name : Auth::user()->name}}</p>
                            <p>组织：{{ $group->group_name }}</p>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">上传导出的txt文件</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="file" type="file" class="form-control">
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
