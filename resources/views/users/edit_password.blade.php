@extends('layouts.app')
 
 @section('content')
 <span>
  <a href="{{ route('mypage') }}">マイページ</a> > パスワード変更
</span>

<h1>パスワード変更</h1>
<hr>

<!-- パスワード不一致で変更できなかった場合にメッセージを表示 -->
@if (session('message'))
<div class="alert alert-warning">
  {{ session('message') }}
</div>
@endif

  <form method="post" action="{{route('mypage.update_password')}}">
   @csrf
     <input type="hidden" name="_method" value="PUT">
     <label for="password" class="">新しいパスワード</label>
     <input id="password" type="password" class="" name="password" required autocomplete="new-password">
     <br>

     <label for="password-confirm" class="col-md-3 col-form-label text-md-right">確認用</label>
 
     <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
     <br>

     <hr>
     <button type="submit" class="">パスワード更新</button>
 </form>
  @endsection
