@extends('layouts.login')

@section('content')
<div class="container">
    {!! Form::open(['url' => '/top']) !!}
    <div class="form-group">
     {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right">送信</button>
    {!! Form::close() !!}
    @foreach ($list as $list)
      <tr>
        <td>{{ $list->user->username }}</td>
        <td>{{ $list->post }}</td>
        <td>{{ $list->created_at }}</td>
        <td>
        <div class="content">
            <a class="js-modal-open" href="/post/update" post="{{ $list->post }}" post_id="{{ $list->id }}">編集</a>
        </div>
        </td>
        <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
      </tr>
    @endforeach
    <div class="modal js-modal">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">
      <form action="/post/update" method="post">
        <textarea name="upPost" class="modal_post"></textarea>
        <input type="hidden" name="id" class="modal_id" value="">
        <input type="submit" value="更新">
        {{ csrf_field() }}
      </form>
      <a class="js-modal-close" href="">閉じる</a>
    </div>

</div>
@endsection