@extends('layouts.login')

@section('content')
<div>
  <form action="/search" method="POST">
    @csrf
    <input type="text" name="keyword" value="">
    <input type="submit" value="検索">
  </form>
  
</div>
<div class="user-list">
@foreach($users as $user)
  <p>{{$user->username}}</p>
  <form action="/follow/{{$user->id}}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">フォローする</button>
  </form>
  <form action="/unfollow/{{$user->id}}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">フォロー解除する</button>
  </form>
@endforeach
</div>

@endsection