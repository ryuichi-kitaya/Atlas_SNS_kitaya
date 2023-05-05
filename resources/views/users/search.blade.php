@extends('layouts.login')

@section('content')
<div>
  <form action="/search" method="GET">
    @csrf
    <input type="text" name="keyword" value="">
    <input type="submit" value="検索">
  </form>
  @foreach($user as $user)
  <tr>
    <td>{{$user->username}}</td>
  </tr>
  @endforeach
</div>

@endsection