@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register']) !!}
<div class="register-container" id="rgba01">
<div class="register-form">
<h2>新規ユーザー登録</h2>

<div class="register-form-content">
<h1>
{{ Form::label('user name') }}
</h1>
<div class="register-message">
@foreach ($errors->get('username') as $error)
<p>{{$error}}</p>
@endforeach
</div>
<p>
{{ Form::text('username',null,['class' => 'input']) }}
</p>
</div>
<div class="register-form-content">
<h1>
{{ Form::label('mail adress') }}
</h1>
<div class="register-message">
@foreach ($errors->get('mail') as $error)
<p>{{$error}}</p>
@endforeach
</div>
<p>
{{ Form::text('mail',null,['class' => 'input']) }}
</p>
</div>
<div class="register-form-content">
<h1>
{{ Form::label('password') }}
</h1>
<div class="register-message">
@foreach ($errors->get('password') as $error)
<p>{{$error}}</p>
@endforeach
</div>
<p>
{{ Form::text('password',null,['class' => 'input']) }}
</p>
</div>
<div class="register-form-content">
<h1>
{{ Form::label('password comfirm') }}
</h1>
<div class="register-message">
@foreach ($errors->get('password') as $error)
<p>{{$error}}</p>
@endforeach
</div>
<p>
{{ Form::text('password_confirmation',null,['class' => 'input']) }}
</p>
</div>
</div>
<div class="trk-btn">
<p>
{{ Form::submit('REGISTER',['class' => 'registerbtn']) }}
</p>
</div>
<div class="back-btn">
<p><a href="/login">ログイン画面へ戻る</a></p>
</div>

</div>

{!! Form::close() !!}


@endsection
