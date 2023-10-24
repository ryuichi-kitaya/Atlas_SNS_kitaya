@extends('layouts.login')

@section('content')

<div class="follower-container">
    <section class="Follower-List">
        <h1>Follower List</h1>
        <div class="user-images">
            @foreach($followers as $follower)
            <a href="{{ url('otherprofile/' .$follower->id)}}"><img src="{{ asset('storage/images/'.$follower->images) }}" width="40px" height="auto"></a>
            @endforeach
        </div>
    </section>
</div>

@foreach($posts as $post)
<div class="follower-timeline">
    <div class="follower-icon">
      <a href="{{ url('otherprofile/' .$post->id) }}"><img src="{{ asset('storage/images/'.$post->user->images) }}" ></a>
    </div>
    <div class="follower-a">
      <p>{{$post->user->username}}</p>
      <p>{{$post->post}}</p>
    </div>
    <div class="follower-b">
      <p>{{$post->created_at }}</p>
    </div>
</div>
@endforeach

@endsection