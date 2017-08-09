@extends('layouts.app')

@section('content')
    <h1>新建项目进展</h1>
    <form action="{{ route('progress.store') }}" method="post">
        {{ csrf_field() }}
        <label>Body</label>
        <textarea name="body" rows="10" style="width:100%;">{{ old('content') }}</textarea>

        <button type="submit">OK</button>
    </form>
@endsection