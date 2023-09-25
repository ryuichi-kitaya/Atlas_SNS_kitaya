@extends('layouts.login')

@section('content')
<div class="search">
  <form action="/search" method="POST">
    @csrf
    <input type="text" name="keyword" placeholder="ユーザー名" value="">

    <input type="image" class="roop" src="images/roop.png" alt="" width="25" height="25" value="">
  </form>
  @if (!empty($keyword))
  <P>検索ワード：{{$keyword}}</P>
  @endif
</div>

@foreach($users as $user)
@if($user->id !== Auth::user()->id)
<div class="search-list">
  <div class="search-icon-name">
    @if($user->images == 'icon1.png')
    <img src="{{ asset('images/icon2.png') }}">
    @else
    <img src="/storage/images/{{$user->images}}">
    @endif
    <p>{{$user->username}}</p>
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
@endif
@endforeach


@endsection