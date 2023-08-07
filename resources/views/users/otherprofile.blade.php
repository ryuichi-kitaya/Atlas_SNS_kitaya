@extends('layouts.login')

@section('content')

<div class="container">
    <section class="user-profile">
        <div class="other-profile">
            <div class="other-icon">
              <img src="{{ asset('storage/images/'.$user->images) }}">
            </div>
            <div class="name-bio">
                <p class="name">name   {{$user->username}}</p>
                <p class="bio">bio     {{$user->bio}}</p>
            </div>
            <div class="btn-content">
              @if(Auth::user()->isFollowing($user))
              <form action="{{route('unfollow', ['user' => $user->id])}}" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger unfollow">フォロー解除</button>
              </form>
              @else
              <form action="{{route('follow', ['user' => $user->id])}}" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger follow">フォローする</button>
              </form>
              @endif
            </div>
        </div>
        @foreach($posts as $post)
        <div class="other-timeline">
          <div class="other-icon">
            <a><img src="{{ asset('storage/images/' .$post->user->images) }}"></a>
          </div>
          <div class="other-a">
            <p>{{$post->user->username}}</p>
            <p>{{$post->post}}</p>
          </div>
          <div class="other-b">
            <p>{{$post->created_at }}</p>
          </div>
        </div>
        @endforeach
    </section>
</div>

@endsection