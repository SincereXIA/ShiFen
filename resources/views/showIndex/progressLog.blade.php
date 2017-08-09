@extends('layouts.app')

@section('content')
    <div id="title" style="text-align: center;">
        <h1>拾纷</h1>
        <div style="padding: 5px; font-size: 16px;">项目进展</div>
        @if($editRight == true)
            <a class="btn btn-default" href="{{ route('progress.create') }}">
                更新进展
            </a>
        @endif
    </div>
    <hr>
    <div id="content">
        <ul class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
            @foreach ($progressLogs as $progressLog)
                <li style="margin: 50px 0;">
                    <div class="body">
                        <p>
                            {{ $progressLog->created_at }}
                        </p>
                        <p>{{ $progressLog->body }}</p>
                    </div>
                    @if($editRight == true)
                        <div class="btn btn-group">
                            <a class="btn btn-default" href="{{ route('progress.edit', $progressLog->id) }}">
                                编辑
                            </a>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection