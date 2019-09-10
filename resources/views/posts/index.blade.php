@extends('layouts.app')

@section('content')
   <ul>
       @if(count($posts)>0)
       @foreach($posts as $post)
       <div class="image-container">
           <img src="{{ $post->path }}" alt="Image" height="70">
       </div>
       <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></li>
       @endforeach
       @endif
   </ul>
@endsection