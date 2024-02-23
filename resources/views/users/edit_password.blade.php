@extends('layouts.app')
 
 @section('content')

  <div class="container">
   <div class="row justify-content-center">
     <div class="col-md-5">
        <h3 class="mt-3 mb-3 text-center">パスワード変更</h3>
        <hr>

        <!-- パスワード不一致で変更できなかった場合にメッセージを表示 -->
        @if (isset($errors))
          @foreach ($errors->all() as $error)
          <div class="alert alert-warning">
          {{ $error }}
          </div>
          @endforeach
        @endif

        <form method="POST" action="{{route('mypage.update_password')}}">
        @csrf
        <input type="hidden" name="_method" value="PUT">
          <div class="form-group row">
            <label for="password" class="col-md-5 col-form-label text-md-left">新しいパスワード</label>
            <div class="col-md-7">
              <input id="password" type="password" name="password" required autocomplete="new-password">
            </div>
          </div>

          <div class="form-group row">
            <label for="password-confirm" class="col-md-5 col-form-label text-md-left">確認用</label>
            <div class="col-md-7"> 
              <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>

          <div class="form-group">
            <button type="submit" class="mt-3 btn nagoyameshi-submit-button w-100">
              パスワード更新
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
 @endsection
