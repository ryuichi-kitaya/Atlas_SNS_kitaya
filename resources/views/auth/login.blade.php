@extends('layouts.logout')

@section('content')


{!! Form::open() !!}

<div class="login-container" id="rgba01">
<div class="login-form">
<div class="form-title">
<p>AtlasSNSへようこそ</p>
</div>
<div class="login-title">
<p>
{{ Form::label('mail adress') }}
<div class="login-message">
@foreach ($errors->get('mail') as $error)
  <p>{{$error}}</p>
@endforeach
</div>
</p>
</div>
{{ Form::text('mail',null,['class' => 'login']) }}
<div class="login-title">
<p>
{{ Form::label('password') }}
<div class="login-message">
@foreach ($errors->get('password') as $error)
  <p>{{$error}}</p>
@endforeach
</div>
</p>
</div>
{{ Form::password('password',['class' => 'login']) }}
</div>
<div class="login-btn">
<p>
{{ Form::submit('LOGIN',['class'=>'loginbtn']) }}
</p>
</div>
<div class="register-btn">
<p><a href="/register">新規ユーザーの方はこちら</a></p>
</div>
{!! Form::close() !!}
</div>

@endsection