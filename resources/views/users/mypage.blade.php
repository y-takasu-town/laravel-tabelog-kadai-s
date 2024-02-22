@extends('layouts.app')

@section('content')
<!-- 有料会員になった・解約した場合/パスワード変更時にメッセージを表示 -->
@if (session('message'))
<div class="alert alert-warning">
  {{ session('message') }}
</div>
@endif

<div class="row justify-content-center align-items-center">
  <h1 class="text-center">{{$user->name}}さんのマイページ</h1>

  <div class="col">
    <table class="table table-striped mx-auto p-2" style="width: 200px;">
      <tr>
        <a href="{{route('mypage.edit')}}">
          <th scope="row">
            <a href="{{route('mypage.edit')}}" class="h4 text-decoration-none text-nowrap fw-bold link-body-emphasis">会員情報編集</a>
          </th>
          <td>
            <div class="text-nowrap">
              お名前・メールアドレスの変更
            </div>
          </td>
      </tr>

      <tr>
        <th scope="row ">
          <a href="{{route('mypage.edit_password')}}" class="h4 text-decoration-none text-nowrap fw-bold link-body-emphasis">パスワード変更</a>
        </th>
        <td>
          <div class="text-nowrap">
            パスワードの変更
          </div>
        </td>
      </tr>

      @if($user->subscribed('main'))
        <tr>
          <th scope="row">
            <a href="{{route('mypage.favorite')}}" class="h4 text-decoration-none text-nowrap fw-bold link-body-emphasis">お気に入り一覧</a>
          </th>
          <td>
           <div class="text-nowrap">
             お気に入りした店舗の一覧
           </div>
          </td>
        </tr>

        <tr>
          <th scope="row">
            <a href="{{route('mypage.reservations')}}" class="h4 text-decoration-none text-nowrap fw-bold link-body-emphasis">予約一覧</a>
          </th>
          <td>
            <div class="text-nowrap">
              ご予約の一覧
            </div> 
          </td>
        </tr>
      @endif

      @if(!$user->subscribed('main'))
        <tr>
          <th scope="row">
            <a href="{{ route('subscript.index') }}" class="h4 text-decoration-none text-nowrap fw-bold link-body-emphasis">有料会員登録</a>
          </th>
          <td>
           <div class="mx-auto text-nowrap">
             お気に入り追加・来店予約・レビューの投稿ができます
            </div>
          </td>
        </tr>
      @else
        <tr>
          <th scope="row" >
            <a href="{{ route('subscript.cancel') }}" class="h4 text-decoration-none text-nowrap fw-bold link-body-emphasis">有料会員を解約する</a>
          </th>
          <td>
            <div class="text-nowrap">
              有料会員（お気に入り追加・来店予約・レビュー投稿）の利用をやめる
            </div>
          </td>
        </tr>
      @endif

      <tr>
        <th scope="row">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="h4 text-decoration-none text-nowrap fw-bold link-body-emphasis">ログアウト</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
          </form>
        </th>
        <td>
          <div class="text-nowrap">
            ログアウトする
          </div>
        </td>
      </tr>
    </table>
  </div>
</div>

@endsection