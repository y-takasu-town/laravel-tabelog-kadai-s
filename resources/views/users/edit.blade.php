@extends('layouts.app')

@section('content')
<nav>
  <a href="{{ route('mypage') }}" class="link-secondary text-decoration-none">マイページ</a> > 会員情報の編集
</nav>

<div class="container">
   <div class="row justify-content-center">
     <div class="col-md-5">
        <h3 class="mt-3 mb-3 text-center">会員情報の編集</h3>
        <hr>

        <form method="POST" action="{{ route('mypage') }}">
        @csrf
          <input type="hidden" name="_method" value="PUT">
          <div class="form-group row">
            <label for="name" class="col-md-5 col-form-label text-md-left">氏名</label>
            <div class="col-md-7">
              <input id="name" type="text" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus placeholder="名古屋 飯太郎">
            </div>
          </div>
          @error('name')
            <span class="" role="alert">
              <strong>氏名を入力してください</strong>
            </span>
          @enderror

          <div class="form-group row">
            <label for="email" class="col-md-5 col-form-label text-md-left">メールアドレス</label>
            <div class="col-md-7"> 
              <input id="email" type="text" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="samurai@samurai.com">
            </div>
          </div>
          @error('email')
            <span class="" role="alert">
              <strong>メールアドレスを入力してください</strong>
            </span>
          @enderror

          <div class="form-group">
            <button type="submit" class="mt-3 btn nagoyameshi-submit-button w-100">
              保存
            </button>
          </div>
        </form>
        <hr>

        <!-- 有料会員限定クレジットカード編集-->
        @if($user->subscribed('main'))
          <div class="form-group">
            <a href="{{ route('subscript.edit') }}">
              <button type="submit" class="mt-3 mb-3 btn nagoyameshi-submit-button w-100">
                クレジットカード編集
              </button>
            </a>
          </div>
        @endif
        <hr>

        <div class="form-group">
          <form method="POST" action="{{ route('mypage.destroy') }}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <div data-bs-toggle="modal" data-bs-target="#delete-user-confirm-modal" class="text-center">
             <a class="btn btn-link mt-3 nagoyameshi-login-text">
                退会する
              </a>
            </div>
        
            <div class="modal fade" id="delete-user-confirm-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><label>本当に退会しますか？</label></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="閉じる">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p class="text-center">一度退会するとデータはすべて削除され復旧はできません。</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn dashboard-delete-link" data-bs-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn nagoyameshi-delete-submit-button">退会する</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection