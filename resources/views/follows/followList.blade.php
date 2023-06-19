@extends('layouts.login')

@section('content')


<ul>
@foreach($posts as $post)
    <li>
        @if($post->images == null)
        <img src="/storage/icon1.png">
        @else
        <img src="/storage/images/{{$user->images}}">
        @endif
        <p>{{$post->user->username}}</p>
        <p>{{$post->post}}</p>
        <p>{{$post->created_at }}</p>
    </li>
@endforeach
</ul>

@endsection