@extends('layouts.app')
 
 @section('content')
  <nav>
    <a href="{{ route('mypage') }}" class="link-secondary text-decoration-none">マイページ</a> >有料会員解約
  </nav>

  <div class="container text-center">
   <div class="row justify-content-center">
     <div class="col-md-7">
       <h3 class="mt-3 mb-3">有料会員解約</h3>
        <h5 class="mb-3">有料会員を解約すると下記のサービスの利用が終了します。</h5>
        <div class="m-3 lh-sm">
          <p>お気に入り登録<p>
          <p>来店予約</p>
          <p>レビュー投稿</p>
        </div>
        <form action="{{route('subscript.cancel')}}" method="POST">
          @csrf
            <button type="submit" class="btn btn-link d-flex justify-content-center nagoyameshi-login-text">解約</button>
        </form>
      </div>
    </div>
  </div>

@endsection