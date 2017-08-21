@extends('layouts.app')

@section('css')
    <!-- Datatables -->
    <link href="{{ asset('/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}"
          rel="stylesheet">
    <link href="{{ asset('/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{ asset('/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset('/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $signEvent->group->group_name }}签到表</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">

                    </p>
                    <form method="post" action="{{ route('sign-table.update',$signEvent->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="input-group">
                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-info">点名事项</button>
                                          </span>
                            <input name="event_name" type="text" class="form-control"
                                   value="{{ $signEvent->event_name }}">
                        </div>
                        <?php $censor = $signEvent->censor ?>
                        <p><strong>点名 by {{ $censor->userInfo? $censor->userInfo->real_name : $censor->name }}</strong>
                        </p>
                        <p><strong>时间 ：{{ $signEvent->event_time }}</strong></p>
                        <hr>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%" style="width: 100%">
                            <thead>
                            <tr style="width: 100%">
                                <th>签到</th>
                                <th>姓名</th>
                                <th>学号</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($signLogs as $signLog)
                                <tr>
                                    <td style="padding: 0; margin: 0 auto !important; text-align: center;line-height: 45px"
                                        width="20%">
                                        @if($signLog->status == 'attend')
                                            <select class="select-success" name="{{ $signLog->id }}">
                                                <option>到课</option>
                                                <option>旷课</option>
                                                <option>请假</option>
                                                <option>迟到</option>
                                            </select>
                                        @elseif($signLog->status == 'absent')
                                            <select class="select-danger" name="{{ $signLog->id }}">
                                                <option>旷课</option>
                                                <option>到课</option>
                                                <option>请假</option>
                                                <option>迟到</option>
                                            </select>
                                        @elseif($signLog->status == 'off')
                                            <select class="select-dark" name="{{ $signLog->id }}">
                                                <option>请假</option>
                                                <option>旷课</option>
                                                <option>到课</option>
                                                <option>迟到</option>
                                            </select>
                                        @elseif($signLog->status == 'late')
                                            <select class="select-warning" name="{{ $signLog->id }}">
                                                <option>迟到</option>
                                                <option>请假</option>
                                                <option>旷课</option>
                                                <option>到课</option>
                                            </select>
                                        @endif
                                    </td>
                                    <?php $user = \App\User::findOrFail($signLog->user_id); ?>
                                    <td style=><span
                                                style="font-size: medium">{{ $user->userInfo? $user->userInfo->real_name : $user->name }}</span>
                                    </td>
                                    <td style=><span style="font-size: medium">{{ $user->student_id }}</span></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-warning btn-lg" type="submit">提交修改</button>
                    </form>
                    <form action="{{ route('sign-table.destroy',$signEvent->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger btn-lg" type="submit">删除此表</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <!-- Datatables -->
    <script src="{{ asset('/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{ asset('/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{ asset('/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{ asset('/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- Switchery -->
    <script src="{{ asset('/vendors/switchery/dist/switchery.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- Autosize -->
    <script src="{{ asset('/vendors/autosize/dist/autosize.min.js') }}"></script>
    <script>
        $('#datatable-responsive').dataTable({
            "lengthMenu": [[-1, 50, 100], ["all", 50, 100,]],
            "language": {
                "url": "{{ asset('/vendors/datatables.net/js/dataTables.chinese.lang') }}"
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script>
        $('.select-success').selectpicker({
            style: 'btn-success btn-xs',
            size: 4,
            width: 'fit'
        });
        $('.select-danger').selectpicker({
            style: 'btn-danger btn-xs',
            size: 4,
            width: 'fit'
        });
        $('.select-dark').selectpicker({
            style: 'btn-dark btn-xs',
            size: 4,
            width: 'fit'
        });
        $('.select-warning').selectpicker({
            style: 'btn-warning btn-xs',
            size: 4,
            width: 'fit'
        });
    </script>
@endsection