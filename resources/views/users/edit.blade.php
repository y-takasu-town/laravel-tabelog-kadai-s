@extends('layouts.app')

@section('content')
<span>
  <a href="{{ route('mypage') }}">マイページ</a> > 会員情報の編集
</span>

<h1>会員情報の編集</h1>
<hr>

<form method="POST" action="{{ route('mypage') }}">
@csrf
<input type="hidden" name="_method" value="PUT">
<label for="name" class="">氏名</label>
<input id="name" type="text" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus placeholder="名古屋 飯太郎">
@error('name')
 <span class="" role="alert">
   <strong>氏名を入力してください</strong>
 </span>
@enderror
<br>

 <label for="email" class="">メールアドレス</label>
 <input id="email" type="text" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="samurai@samurai.com">
 @error('email')
 <span class="" role="alert">
   <strong>メールアドレスを入力してください</strong>
 </span>
@enderror
<br>

<hr>
<button type="submit" class="">
  保存
</button>
</form>

@endsection