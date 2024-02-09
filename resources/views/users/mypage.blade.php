@extends('layouts.app')

@section('content')
<!-- 有料会員になった・解約した場合/パスワード変更時にメッセージを表示 -->
@if (session('message'))
<div class="alert alert-warning">
  {{ session('message') }}
</div>
@endif

<h1>{{$user->name}}さんのマイページ</h1>

<a href="{{route('mypage.edit')}}">会員情報編集</a>
<br>

<a href="{{route('mypage.edit_password')}}">パスワード変更</a>
<br>

@if($user->subscribed('main'))
  <a href="{{route('mypage.favorite')}}">お気に入り一覧</a>
  <br>

  <a href="{{route('mypage.reservations')}}">予約一覧</a>
  <br>
@endif

@if(!$user->subscribed('main'))
  <a href="{{ route('subscript.index') }}">有料会員になる</a>
@else
  <a href="{{ route('subscript.cancel') }}">有料会員を解約する</a>
@endif
<br>

<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
<br>

@endsection