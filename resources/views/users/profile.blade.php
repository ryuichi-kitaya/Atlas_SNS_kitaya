@extends('layouts.login')

@section('content')

<div class="profile-container">
{!! Form::open(['url' => ['/profile/{id}/edit'], 'method' => 'post','enctype'=>"multipart/form-data"]) !!}
{!! Form::hidden('id',$user->id) !!}
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
<div class="profile-box">
<div class="icon-pro">
<img src="{{ asset('storage/images/'.Auth::user()->images) }}">
</div>
<div class="edit-content">
<p>
{{ Form::label('username','user name',['class' => 'label']) }}
{{ Form::text('username',$user->username,['class' => 'input']) }}
</p>
<p>
{{ Form::label('mail','mail adress',['class' => 'label']) }}
{{ Form::text('mail',$user->mail,['class' => 'input']) }}
</p>
<p>
{{ Form::label('password','password',['class' => 'label']) }}
{{ Form::password('password',['class' => 'input']) }}
</p>
<p>
{{ Form::label('password_confirmation','password confirm',['class' => 'label']) }}
{{ Form::password('password_confirmation',['class' => 'input']) }}
</p>
<p>
{{ Form::label('bio','bio',['class' => 'label']) }}
{{ Form::text('bio',$user->bio,['class' => 'input']) }}
</p>
<p>
{{ Form::label('image','image',['class' => 'label']) }}
{{ Form::label('image','image',['class' => 'picture']) }}
{{ Form::file('image',['class' => 'file','id' =>'fileElem','style' => 'display:none']) }}
<button id="fileSelect" type="button">ファイルを選択</button>
</p>
</div>
</div>
<div class="koshin">
<p>
{{ Form::submit('更新',['class' => 'koshin-btn']) }}
</p>
</div>
{!! Form::close() !!}
</div>

@endsection