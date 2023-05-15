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
@endforeach
</div>

@endsection