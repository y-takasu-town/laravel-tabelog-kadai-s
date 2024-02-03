@extends('layouts.app')

@section('content')
<span>
  <a href="{{ route('mypage') }}">マイページ</a> > 会員情報の編集
</span>

<h1>会員情報の編集</h1>
<hr>

<form method="POST" action="{{ route('mypage') }}">
@csrf
<input type="hidden" name="_method" value="PUT">
<label for="name" class="">氏名</label>
<input id="name" type="text" name="name" value="{{ $user->name}}" required autocomplete="name" autofocus placeholder="名古屋 飯太郎">
@error('name')
 <span class="" role="alert">
   <strong>氏名を入力してください</strong>
 </span>
@enderror
<br>

 <label for="email" class="">メールアドレス</label>
 <input id="email" type="text" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="samurai@samurai.com">
 @error('email')
 <span class="" role="alert">
   <strong>メールアドレスを入力してください</strong>
 </span>
@enderror
<br>



<hr>
<button type="submit" class="">
  保存
</button>
</form>

<hr>
<div class="d-flex justify-content-start">
 <form method="POST" action="{{ route('mypage.destroy') }}">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
     <div class="btn dashboard-delete-link" data-bs-toggle="modal" data-bs-target="#delete-user-confirm-modal">退会する</div>
 
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


@if($user->subscribed('main'))
<a href="{{ route('subscript.edit') }}">クレジットカード編集</a>
@endif

@endsection