@extends('layouts.login')

@section('content')

<div class="followlist-container">
    <section class="Follow-List">
        <h1>Follow List</h1>
        <div class="user-images">
            @foreach($followings as $following)
            <a href="{{ url('otherprofile/' .$following->id)}}"><img src="{{ asset('storage/images/'.$following->images) }}" width="40px" height="auto"></a>
            @endforeach
        </div>
    </section>
</div>

@foreach($posts as $post)
<div class="follow-timeline">
    <div class="follow-icon">
      <a href="{{ url('otherprofile/' .$post->id) }}"><img src="{{ asset('storage/images/'.$post->user->images) }}"></a>
    </div>
    <div class="follow-a">
      <p>{{$post->user->username}}</p>
      <p>{{$post->post}}</p>
    </div>
    <div class="follow-b">
      <p>{{$post->created_at }}</p>
    </div>
</div>
@endforeach

@endsection