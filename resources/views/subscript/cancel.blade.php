@extends('layouts.app')
 
 @section('content')
  <div class="container">
   <div class="row justify-content-center">
     <div class="col-md-5">
       <h3 class="mt-3 mb-3 text-center">有料会員解約</h3>
       <h5 class="mb-3">有料会員を解約すると下記のサービスの利用が終了します。</h5>
        <div class="row justify-content-center">
          <ul class="col-md-7">
            <li>お気に入り登録</li>
            <li>来店予約</li>
            <li>レビュー投稿</li>
          </ul>
        </div>
        <form action="{{route('subscript.cancel')}}" method="POST">
          @csrf
            <button type="submit" class="mt-3 btn nagoyameshi-submit-button col-6 w-100">解約</button>
        </form>
      </div>
    </div>
  </div>
@endsection