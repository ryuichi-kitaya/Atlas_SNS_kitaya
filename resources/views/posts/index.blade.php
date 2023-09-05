@extends('layouts.login')

@section('content')
<div class="container">
    {!! Form::open(['url' => '/top']) !!}
    <div class="form-group">
     {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
     <p><input type="image" src="images/post.png" alt="" width="67" height="67"></p>
    </div>
    {!! Form::close() !!}
    @foreach ($list as $list)
      <div class="timeline">
        <div class="top-icon">
          <a><img src="{{ asset('storage/images/'.$list->user->images) }}"></a>
        </div>
        <div class="top-a">
          <p>{{ $list->user->username }}</p>
          <p>{{ $list->post }}</p>
        </div>
        <div class="top-b">
          <p>{{ $list->created_at }}</p>
          <div class="top-c">
            <a class="js-modal-open" href="/post/update" post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="/images/edit.png" width="30" height="30" alt="編集"></a>
            <a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="/images/trash.png" width="30" height="30" alt="削除"></a>
          </div>
        </div>
      </div>
    @endforeach
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <form action="/post/update" method="post">
          <textarea name="upPost" class="modal_post"></textarea>
          <input type="hidden" name="id" class="modal_id" value="">
          <p><input type="image" name="edit" width="30" height="30" src="/images/edit.png" alt=""></p>
          {{ csrf_field() }}
        </form>
      </div>
    </div>
</div>
@endsection