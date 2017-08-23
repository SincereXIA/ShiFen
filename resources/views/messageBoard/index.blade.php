@extends('layouts.app')
@section('title')
    留言板
@endsection
@section('content')
    @include('messageBoard.create')
    <?php
    $loginCheck = \Illuminate\Support\Facades\Auth::check();
    $loginId = \Illuminate\Support\Facades\Auth::id();
    ?>
    <hr class="col-xs-12 hidden-lg">
    <div class="container">
        <ul class="col-md-6">
            <h2>留言内容</h2>
            @foreach($messagesOnBoard as $messageOnBoard)
                <li class="col-xs-12">
                    @if($messageOnBoard->user_id==null)
                        <h3>匿名：</h3>
                    @else
                        <h3>{{ $messageOnBoard->user->name }}:</h3>
                    @endif
                    <p style="font-size: medium">
                        {{ $messageOnBoard->body }}
                    </p>
                    <div>
                        {{ $messageOnBoard->created_at->diffForHumans() }}

                        <div class="btn-group pull-right" style="display: flex;flex-flow: row">
                            <a class="btn btn-default btn-sm"
                               href="{{ route('messageBoard.reply', $messageOnBoard->id) }}">回复</a>
                            @if($loginCheck and $messageOnBoard->user_id==$loginId)

                                {!! Form::open(['route'=>['messageBoard.destroy',$messageOnBoard->id]]) !!}
                                {{ method_field('DELETE') }}
                                <a class="btn btn-info btn-sm"
                                   href="{{ route('messageBoard.edit', $messageOnBoard->id) }}">编辑</a>
                                {!! Form::submit('删除',['class'=>'btn btn-danger btn-sm','style'=>'display:inline']) !!}
                                {!! Form::close() !!}

                            @endif
                        </div>
                    </div>
                </li>
                <hr style="width: 100%">

                <div class="reply col-xs-10 pull-right">
                    @foreach($commentsOnBoard as $comment)
                        @if($comment->comment_id == $messageOnBoard->id)
                            <li>
                                @if($comment->user_id==null)
                                    <h3>匿名：</h3>
                                @else
                                    <h3>{{ $comment->user->name }}:</h3>
                                @endif
                                <p style="font-size: medium">
                                    {{ $comment->body }}
                                </p>
                                <div>
                                    {{ $comment->created_at->diffForHumans() }}

                                    <div class="btn-group pull-right" style="display: flex;flex-flow: row">
                                        @if($loginCheck and $comment->user_id==$loginId)

                                            {!! Form::open(['route'=>['messageBoard.destroy',$comment->id]]) !!}
                                            {{ method_field('DELETE') }}
                                            <a class="btn btn-info btn-sm"
                                               href="{{ route('messageBoard.edit', $comment->id) }}">编辑</a>
                                            {!! Form::submit('删除',['class'=>'btn btn-danger btn-sm','style'=>'display:inline']) !!}
                                            {!! Form::close() !!}

                                        @endif
                                    </div>
                                </div>
                            </li>
                            <hr style="width: 100%">
                        @endif
                    @endforeach
                </div>
            @endforeach
        </ul>
    </div>
@endsection