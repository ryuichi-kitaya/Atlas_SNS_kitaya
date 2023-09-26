@extends('layouts.logout')

@section('content')

<div class="clear" id="rgba01">
  <div class="clear-name">
  <p>{{Session::get('username')}}さん</p>
  </div>
  <div class="clear-title">
  <p>ようこそ! AtlasSNSへ</p>
  </div>
  <div class="clear-message">
  <p>ユーザー登録が完了いたしました。</p>
  <p>早速ログインをしてみましょう！</p>
  </div>
  <div class="clear-btn">
  <p class="btn"><a href="/login">ログイン画面へ</a></p>
  </div>
</div>

@endsection