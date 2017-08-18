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

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $group->group_name }}签到表</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">

                    </p>
                    <form method="post" action="{{ route('sign-table.store') }}">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-info">点名事项</button>
                                          </span>
                            <input name="event_name" placeholder="e.g. 晚点名" type="text" class="form-control">
                        </div>
                        <input name="event_time" type="hidden" value="{{ \Carbon\Carbon::now() }}">
                        <input name="group_id" type="hidden" value="{{ $group->id }}">
                        <input name="censor_id" type="hidden" value="{{ Auth::id() }}">
                        <p>点名 by {{ Auth::user()->userInfo->real_name }}</p>
                        <p>时间 ：{{ \Carbon\Carbon::now() }}</p>
                        <hr>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>签到</th>
                                <th>姓名</th>
                                <th>学号</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td style="padding: 0 !important;margin: 0!important;">
                                        <div class="checkbox">
                                            <label>
                                                <input name="{{$user->id}}" type="checkbox" class="flat"
                                                       checked="checked">
                                            </label>
                                        </div>
                                    </td>
                                    <td>{{ $user->userInfo? $user->userInfo->real_name : $user->name }}</td>
                                    <td>{{ $user->student_id }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <button class="btn btn-success btn-lg" type="submit">完成点名</button>
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

@endsection