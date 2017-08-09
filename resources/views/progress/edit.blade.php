@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h1 class="panel-title">
                    编辑项目进展{{ $progressLog->id }}
                </h1>
            </div>
            <div class="panel-body">
                {{-- 错误信息输出  --}}
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="list-group-item list-group-item-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                {!! Form::open(['route'=> ['progress.update',$progressLog->id]]) !!}
                {{ method_field('PATCH') }}
                <div class="form-group">

                    {!! Form::label('body','正文:') !!}

                    {!! Form::textarea('body',$progressLog->body,['class'=>'form-control']) !!}

                </div>
                <div class="form-group">

                    {!! Form::submit('更新进展',['class'=>'btn btn-success btn-lg']) !!}
                    <a class="btn btn-default btn-lg" href="{{ route('progress.index') }}">返回</a>

                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection