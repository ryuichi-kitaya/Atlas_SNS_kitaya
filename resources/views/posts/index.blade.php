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
        <td>{{ $list->username }}</td>
        <td>{{ $list->post }}</td>
        <td>{{ $list->created_at }}</td>
        <td></td>
        <td></td>
    </tr>
    @endforeach
</div>

@endsection