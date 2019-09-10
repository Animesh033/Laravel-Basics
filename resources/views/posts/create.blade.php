@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="/posts" enctype="multipart/form-data">
    {{ csrf_field() }}
        <input type="text" name="title" placeholder="Enter title">
        <div class="form-group"> 
                <input type="file" class="form-control-file" name="fileToUpload" id="exampleInputFile"> 
            </div> 
        <input type="submit" name="submit">
    </form>
@endsection