@extends('layouts.login')

@section('content')

<ul>
@foreach($posts as $post)
    <li>
        <image>image</image>
        <p>{{$post->user->username}}</p>
        <p>{{$post->post}}</p>
        <p>{{$post->created_at }}</p>
    </li>
@endforeach
</ul>

@endsection