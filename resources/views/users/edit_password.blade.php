@extends('layouts.app')
 
 @section('content')
 <span>
  <a href="{{ route('mypage') }}">マイページ</a> > パスワード変更
</span>

<h1>パスワード変更</h1>
<hr>
  <form method="post" action="{{route('mypage.update_password')}}">
   @csrf
     <input type="hidden" name="_method" value="PUT">
     <label for="password" class="">新しいパスワード</label>
     <input id="password" type="password" class="" name="password" required autocomplete="new-password">
     <br>

     @error('password')
       <span class="" role="alert">
         <strong>{{ $message }}</strong>
       </span>
      @enderror

     <label for="password-confirm" class="col-md-3 col-form-label text-md-right">確認用</label>
 
     <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
 <br>

 <hr>
     <button type="submit" class="">パスワード更新</button>
     </form>
  @endsection
