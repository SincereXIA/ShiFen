<div class="col-md-5 col-md-offset-1">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h1 class="panel-title">
                留言：
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

            {!! Form::open(['route'=> 'messageBoard.store']) !!}
            <div class="form-group">

                {!! Form::textarea('body',null,['class'=>'form-control']) !!}

            </div>
            <div class="form-group">
                @if(\Illuminate\Support\Facades\Auth::check()==true)
                    {!! Form::checkbox('anonymous', 'true'); !!}
                    匿名留言<br>
                    {!! Form::hidden('user_id',\Illuminate\Support\Facades\Auth::id()) !!}
                    {!! Form::submit('点击留言',['class'=>'btn btn-success btn-lg']) !!}
                @else
                    {!! Form::submit('匿名留言',['class'=>'btn btn-default btn-lg']) !!}
                    <a href="{{ url('/login') }}">登录</a>以退出匿名身份
                @endif

            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
