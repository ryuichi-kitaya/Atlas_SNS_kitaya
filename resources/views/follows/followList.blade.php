@extends('layouts.login')

@section('content')

@foreach($posts as $post)
<tr>
    <td>image</td>
    <td>{{$post->user->username}}</td>
    <td>{{$post->post}}</td>
</tr>
@endforeach

@endsection