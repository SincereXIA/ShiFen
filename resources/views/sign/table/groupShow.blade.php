@extends('layouts.app')
@section('title')
    {{ $group->group_name }}的签到表
@endsection
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
                    <h1>{{ $group->group_name }}的签到表</h1>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">

                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                           cellspacing="0" width="100%" style="width: 100%">
                        <thead>
                        <tr style="width: 100%">
                            <th>时间</th>
                            <th>名称</th>
                            <th>到课人数</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($signEvents as $signEvent)
                            <tr>
                                <td>
                                    <span style="font-size: small">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $signEvent->event_time)->diffForHumans() }}</span>
                                </td>
                                <td style="width: 30%">
                                    <a href="{{ route('sign-table.show',$signEvent->id) }}"
                                       style="font-size: medium;color: #1b809e">{{ $signEvent->event_name }}</a>
                                </td>
                                <td><a href="{{ route('sign-table.show',$signEvent->id) }}"
                                       style="font-size: medium">{{ \App\SignLog::where('event_id',$signEvent->id)->where('status','attend')->count() }}</a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-default"
                                       href="{{ route('sign-table.show',$signEvent->id) }}">查看</a>
                                    <a class="btn btn-sm btn-info" href="{{ route('sign-table.edit',$signEvent->id) }}">编辑</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
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