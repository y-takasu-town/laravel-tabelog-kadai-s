 @extends('layouts.app')
 
 @section('content')
 
 <div class="d-flex justify-content-center">
     <div class="row w-75">
         <div class="col-5 offset-1">
             <img src="{{ asset('')}}" class="w-100 img-fluid">
         </div>
         <div class="col">
             <div class="d-flex flex-column">
                 <h1 class="">
                     {{$store->name}}
                 </h1>
                 <p class="">
                     {{$store->description}}
                 </p>
                 <p class="">
                     {{$store->price}}
                 </p>
                 <p class="">
                     {{ substr($store->open_time,0,5)}}〜{{substr($store->close_time,0,5)}}
                 </p>
                 <p class="">
                     {{$store->posal_code}}
                 </p>
                 <p class="">
                     {{$store->address}}
                 </p>
                 <p class="">
                     {{$store->phone_number}}
                 </p>
                 <p class="">
                     {{$store->holiday}}
                 </p>
                 <hr>
             </div>
             @auth
             <form method="POST" class="m-3 align-items-end">
                 @csrf
                 <input type="hidden" name="id" value="{{$store->id}}">
                 <input type="hidden" name="name" value="{{$store->name}}">
                 <input type="hidden" name="weight" value="0">

                 <div class="row">
                     <div class="col-7">
                         <button type="submit" class="btn nagoyameshu-submit-button w-100">
                             <i class="fas fa-shopping-cart"></i>
                             予約する
                         </button>
                     </div>
                     <div class="col-5">
                         <a href="/store/{{ $store->id }}/favorite" class="btn nagoyameshi-favorite-button text-dark w-100">
                             <i class="fa fa-heart"></i>
                             お気に入り
                         </a>
                     </div>
                 </div>
             </form>
             @endauth
         </div>
 
         <div class="offset-1 col-11">
             <hr class="w-100">
             <h3 class="float-left">レビュー</h3>
         </div>
 
         <div class="offset-1 col-10">
             <!-- レビューの実装 -->
             <div class="row">
                 @foreach($reviews as $review)
                 <div class="offset-md-5 col-md-5">
                     <p class="h3">{{$review->content}}</p>
                     <label>{{$review->created_at}}　{{$review->user->name}}</label>
                 </div>
                 @endforeach
             </div><br />
 
             @auth
             <div class="row">
                 <div class="offset-md-5 col-md-5">
                     <form method="POST" action="{{ route('reviews.store') }}">
                         @csrf
                         <h4>レビュー内容</h4>
                         @error('content')
                             <strong>レビュー内容を入力してください</strong>
                         @enderror
                         <textarea name="content" class="form-control m-2"></textarea>
                         <input type="hidden" name="store_id" value="{{$store->id}}">
                         <button type="submit" class="btn nagoyameshi-submit-button ml-2">レビューを追加</button>
                     </form>
                 </div>
             </div>
             @endauth

         </div>
     </div>
 </div>
 @endsection
