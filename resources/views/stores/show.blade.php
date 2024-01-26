@extends('layouts.app')

@section('content')

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

@endsection