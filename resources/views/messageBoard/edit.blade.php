@extends('layouts.app')

@section('content')
    <div class="col-md-5 col-md-offset-1">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h1 class="panel-title">
                    回复内容：
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

                {!! Form::model($messageOnBoard,['route' => ['messageBoard.update',$id]]) !!}
                {{ method_field('PATCH') }}

                {!! Form::label('body','留言内容:') !!}
                <div class="form-group">

                    {!! Form::textarea('body',null,['class'=>'form-control']) !!}

                </div>
                <div class="form-group">
                    {!! Form::submit('提交修改',['class'=>'btn btn-primary']) !!}

                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection