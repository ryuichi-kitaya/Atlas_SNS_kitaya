@extends('layouts.login')

@section('content')
<div>
  <form action="/search" method="POST">
    @csrf
    <input type="text" name="keyword" value="">
    <input type="submit" value="検索">
  </form>

  @if (!empty($keyword))
  <P>検索ワード：{{$keyword}}</P>
  @endif
  
</div>
<div class="user-list">
@foreach($users as $user)
  @if($user->images == 'icon1.png')
  <img src="{{ asset('images/icon2.png') }}">
  @else
  <img src="/storage/images/{{$user->images}}">
  @endif
  <p>{{$user->username}}</p>
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
@endforeach
</div>

@endsection