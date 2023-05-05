@extends('layouts.login')

@section('content')
<div>
  <form action="/search" method="GET">
    @csrf
    <input type="text" name="keyword" value="{{$keyword}}">
    <input type="submit" value="検索">
  </form>
  
</div>

@endsection