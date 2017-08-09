@extends('layouts.app')

@section('content')
    @include('messageBoard.create')
    <hr class="col-xs-12 hidden-lg">
    <div class="container">
        <ul class="col-md-6">
            <h2>留言内容</h2>
            @foreach($messagesOnBoard as $messageOnBoard)
                <li>
                    @if($messageOnBoard->user_id==null)
                        <h3>匿名：</h3>
                    @else
                        <h3>{{ $messageOnBoard->user->name }}:</h3>
                    @endif
                    <p style="font-size: medium">
                        {{ $messageOnBoard->body }}
                    </p>
                    <span>{{ $messageOnBoard->created_at->diffForHumans() }}</span>
                </li>
                <hr>
            @endforeach
        </ul>
    </div>

@endsection