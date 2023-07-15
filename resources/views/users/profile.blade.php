@extends('layouts.login')

@section('content')

{!! Form::open(['url' => ['/profile/{id}/edit'], 'method' => 'post','enctype'=>"multipart/form-data"]) !!}
{!! Form::hidden('id',$user->id) !!}
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
<tr>
<td>
{{ Form::label('username','user name') }}
{{ Form::text('username',$user->username,['class' => 'input']) }}
</td>
<td>
{{ Form::label('mail','mail adress') }}
{{ Form::text('mail',$user->mail,['class' => 'input']) }}
</td>
<td>
{{ Form::label('password','password') }}
{{ Form::password('password',null,['class' => 'input']) }}
</td>
<td>
{{ Form::label('password_confirm','password confirm') }}
{{ Form::password('password',null,['class' => 'input']) }}
</td>
<td>
{{ Form::label('bio','bio') }}
{{ Form::text('bio',$user->bio,['class' => 'input']) }}
</td>
<td>
{{ Form::label('image','image') }}
{{ Form::file('image',['class' => 'input','id' =>'icon']) }}
</td>
<td>
{{ Form::submit('更新') }}
</td>
</tr>
{!! Form::close() !!}

@endsection