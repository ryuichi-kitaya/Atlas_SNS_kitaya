@extends('layouts.logout')

@section('content')


{!! Form::open() !!}

<div class="login-container">
<div class="login-form">
<p>AtlasSNSへようこそ</p>
<div class="mail-pass">
<div class="login-mail">
<p>
{{ Form::label('mail adress') }}
</p>
</div>
{{ Form::text('mail',null,['class' => 'login']) }}
<div class="login-password">
<p>
{{ Form::label('password') }}
</p>
</div>
{{ Form::password('password',['class' => 'login']) }}
</div>
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