@extends('layouts.login')

@section('content')

<ul>
@foreach($posts as $post)
    <li>
        <a><img src="{{ asset('storage/images/'.$post->user->images) }}"></a>
        <p>{{$post->user->username}}</p>
        <p>{{$post->post}}</p>
        <p>{{$post->created_at }}</p>
    </li>
@endforeach
</ul>

@endsection