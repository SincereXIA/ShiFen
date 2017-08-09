@extends('layouts.app')

@section('content')
    <h1>编辑项目进展</h1>
    <form action="{{ route('progress.update',$progressLog->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <label>Body</label>
        <textarea name="body" rows="10" style="width:100%;">{{ $progressLog->body }}</textarea>

        <button type="submit" class="btn-default">确认更新</button>
    </form>
@endsection