@extends('layouts.login')

@section('content')

<div class="container">
    <section class="Follower-List">
        <h1>Follower List</h1>
        <div class="user-images">
            @foreach($followers as $follower)
            <a href="{{ url('otherprofile/' .$follower->id)}}"><img src="{{ asset('storage/images/'.$follower->images) }}"></a>
            @endforeach
        </div>
    </section>
</div>

<ul>
@foreach($posts as $post)
    <li>
        <a href="{{ url('otherprofile/' .$post->id) }}"><img src="{{ asset('storage/images/'.$post->user->images) }}"></a>
        <p>{{$post->user->username}}</p>
        <p>{{$post->post}}</p>
        <p>{{$post->created_at }}</p>
    </li>
@endforeach
</ul>

@endsection