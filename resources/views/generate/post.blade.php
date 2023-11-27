@extends('layouts.app')

@section('content')
<div style="min-height: 200px;">
    <form action="{{route('post.generate')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="file" name="pic">
        <input type="submit" value="upload">
    </form>
</div>
@endsection
