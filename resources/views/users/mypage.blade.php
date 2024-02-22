@extends('layouts.app')

@section('content')
<!-- 有料会員になった・解約した場合/パスワード変更時にメッセージを表示 -->
@if (session('message'))
<div class="alert alert-warning">
  {{ session('message') }}
</div>
@endif

<div class="row justify-content-center align-center">
  <h1 class="text-center">{{$user->name}}さんのマイページ</h1>

  <div class="col-5">
    <table class="table table-striped mx-auto">
      <tr>
        <a href="{{route('mypage.edit')}}">
          <th scope="row">
            <a href="{{route('mypage.edit')}}" class="h2 text-decoration-none fw-bold">会員情報編集</a>
          </th>
<div class="mx-auto">
          <td>お名前・メールアドレスの変更</td>
          <div>
      </tr>

      <tr>
        <th scope="row">
          <a href="{{route('mypage.edit_password')}}">パスワード変更</a>
        </th>
        <td>パスワードの変更</td>
      </tr>

      @if($user->subscribed('main'))
        <tr>
          <th scope="row">
            <a href="{{route('mypage.favorite')}}">お気に入り一覧</a>
          </th>
          <td>お気に入りした店舗の一覧</td>
        </tr>

        <tr>
          <th scope="row">
            <a href="{{route('mypage.reservations')}}">予約一覧</a>
          </th>
          <td>ご予約の一覧</td>
        </tr>
      @endif

      @if(!$user->subscribed('main'))
        <tr>
          <th scope="row">
            <a href="{{ route('subscript.index') }}">有料会員登録</a>
          </th>
          <td>お気に入り追加・来店予約ができます</td>
        </tr>
      @else
        <tr>
          <th scope="row" >
            <a href="{{ route('subscript.cancel') }}">有料会員を解約する</a>
          </th>
          <td>有料会員（お気に入り追加・来店予約）の利用をやめる
        </tr>
      @endif

      <tr>
        <th scope="row">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
          </form>
        </th>
        <td>ログアウトする</td>
      </tr>
    </table>
  </div>
</div>

@endsection