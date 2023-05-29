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
  <form action="/users/{{$user->id}}/follow" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">フォローする</button>
  </form>
  <form action="/users/{{$user->id}}/unfollow" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">フォロー解除する</button>
  </form>
@endforeach
</div>

@endsection