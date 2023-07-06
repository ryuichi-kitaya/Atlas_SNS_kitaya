@extends('layouts.login')

@section('content')

<div class="container">
    <section class="Follow-List">
        <h1>Follow List</h1>
        <div class="user-images">
            @foreach($followings as $following)
            <a href="{{ url('otherprofile/' .$following->id)}}"><img src="{{ asset('storage/images/'.$following->images) }}"></a>
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