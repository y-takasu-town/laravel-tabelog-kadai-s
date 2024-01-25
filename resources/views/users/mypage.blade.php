@extends('layouts.app')

@section('content')
<h1>{{$user->name}}さんのマイページ</h1>

<a href="{{route('mypage.edit')}}">会員情報編集</a>
<br>

<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
<br>

<a href="{{route('mypage.edit_password')}}">パスワード変更</a>
<br>

<a href="{{route('mypage.favorite')}}">お気に入り</a>
<br>


@endsection