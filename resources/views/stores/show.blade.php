@extends('layouts.app')

@section('content')
<h1 class="">
     {{$store->name}}
</h1>
                
<p class=""> {{$store->description}} </p>
<hr>
<p class="">価格帯： {{$store->price}} </p>
<p class="">営業時間： {{ substr($store->open_time,0,5)}}〜{{substr($store->close_time,0,5)}} </p>
<p class="">郵便番号： {{$store->posal_code}} </p>
<p class="">住所： {{$store->address}} </p>
<p class="">電話番号： {{$store->phone_number}} </p>
<p class="">店舗休業日： {{$store->holiday}} </p>
<hr>

<!-- 予約画面へ --> 
<a href="{{route('stores.reservation',$store)}}">予約する</a>
<br>

<!-- お気に入り機能 -->
@if($store->isFavoritedBy(Auth::user()))
 <a href="{{ route('stores.favorite', $store) }}" class="">
     お気に入り解除
 </a>
 @else
 <a href="{{ route('stores.favorite', $store) }}" class="">
     お気に入り
 </a>
@endif
<br>

<!-- レビュー一覧 -->
@foreach($reviews as $review)
<p>{{$review->content}}</p>
<label>{{$review->created_at}}{{$review->user->name??''}}</label>
@endforeach
<br>

<!-- 有料会員のみレビュー投稿画面へ -->
<a href="{{route('stores.review',$store)}}">レビュー投稿</a>

@endsection