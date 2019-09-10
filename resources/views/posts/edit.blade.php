@extends('layouts.app')

@section('content')
    <h1>Update Post</h1>
    <form method="post" action="/posts/{{ $post->id }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" value="{{ $post->title }}" placeholder="Enter title">
        <input type="submit" name="submit" value="Update">
    </form>

    <form method="post" action="/posts/{{ $post->id }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Delete">
    </form>

@endsection