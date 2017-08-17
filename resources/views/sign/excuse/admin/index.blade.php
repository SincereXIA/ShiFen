@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-align-left"></i> 待审核的请假条
                    <small>Sessions</small>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <!-- start accordion -->
                <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
                    <?php $i = 0 ?>
                    @foreach($allAdminAtGroups as $adminAtGroups)
                        @foreach($adminAtGroups as $adminAtGroup)
                            <?php $i++ ?>
                            <div class="panel">
                                <a class="panel-heading" role="tab" id="{{ 'heading'.(string)$i }}"
                                   data-toggle="collapse" data-parent="#accordion" href="#{{ 'collapse'.(string)$i }}"
                                   aria-expanded="true" aria-controls="{{ 'collapse'.(string)$i }}">
                                    <h4 class="panel-title">{{ $adminAtGroup->group_name }}</h4>
                                </a>
                                <div id="{{ 'collapse'.(string)$i }}" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="{{ 'heading'.(string)$i }}" aria-expanded="true" style="">
                                    <div class="panel-body">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>姓名</th>
                                                <th>请假开始</th>
                                                <th>操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($groupExcuses) > 0)
                                                @foreach($groupExcuses[$adminAtGroup->id] as $groupExcuse)
                                                    <?php $j = 0 ?>
                                                    <tr>
                                                        <th scope="row" style="line-height: 30px">{{ ++$j }}</th>
                                                        <td style="line-height: 30px">{{ \App\User::findOrFail($groupExcuse->user_id)->name}}</td>
                                                        <td style="line-height: 30px">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $groupExcuse->start_at)->diffForHumans() }}</td>
                                                        <td>
                                                            <form method="post"
                                                                  action="{{ route('sign-excuse.pass',$groupExcuse->id) }}">
                                                                {{ csrf_field() }}
                                                                {{ method_field('PATCH') }}
                                                                <a class="btn btn-sm btn-info"
                                                                   href="{{ route('sign-excuse.adminShow',$groupExcuse->id) }}">审核</a>
                                                                <input name="excuse_id" type="hidden"
                                                                       value="{{ $groupExcuse->id }}">
                                                                <button type="submit" class="btn btn-sm btn-success">
                                                                    通过
                                                                </button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <th></th>
                                                    <td colspan="3">无</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <!-- end of accordion -->
            </div>
        </div>
    </div>
@endsection