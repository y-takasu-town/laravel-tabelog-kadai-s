@extends('layouts.app')

@section('content')
<h1>{{$user->name}}さんのマイページ</h1>

<a href="{{route('mypage.edit')}}">会員情報編集</a>
<br>
<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
@endsection