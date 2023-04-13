@extends('layouts.login')

@section('content')
<div class="container">
    {!! Form::open(['url' => 'post/top']) !!}
    <div class="form-group">
     {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right">送信</button>
    {!! Form::close() !!}
</div>

@endsection