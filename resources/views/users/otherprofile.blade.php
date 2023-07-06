@extends('layouts.login')

@section('content')

<div class="container">
    <section class="user-profile">
        <div class="profile">
            <div class="user-image">
            <img src="{{ asset('storage/images/'.$user->images) }}">
            </div>
            <div class="name-bio">
                <p class="name">{{$user->username}}</p>
                <p class="bio">{{$user->bio}}</p>
            </div>
            `
            @if(Auth::user()->isFollowing($user))
            <form action="{{route('unfollow', ['user' => $user->id])}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">フォロー解除</button>
            </form>
            @else
            <form action="{{route('follow', ['user' => $user->id])}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">フォローする</button>
            </form>
            @endif
        </div>
        <div class="timeline">
        @foreach($posts as $post)
         <li>
            <a><img src="{{ asset('storage/images/'.$post->user->images) }}"></a>
            <p>{{$post->user->username}}</p>
            <p>{{$post->post}}</p>
            <p>{{$post->created_at }}</p>
         </li>
       @endforeach
        </div>
    </section>
</div>

@endsection