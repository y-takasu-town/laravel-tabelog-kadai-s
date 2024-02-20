@extends('layouts.app')

@section('content')
  <span>
    <a href="{{ route('mypage') }}">マイページ</a> > お気に入り
  </span>

  <h3 class="mt-3 mb-3 text-center">お気に入り</h3>

  <div class="row">
    <div class="col text-center">
      @foreach ($favorites as $fav)
      <div class="col-4 mb-4 nagoyameshi-store-flame">
      <h3 class="mb-2 nagoyameshi-store-name">{{App\Models\Store::find($fav->favoriteable_id)->name}}</h3>

      <a href="{{route('stores.show', $fav->favoriteable_id)}}" class="">

      店舗画像
      </a>
      <h6 class="">&yen;{{App\Models\Store::find($fav->favoriteable_id)->price}}</h6>

      <a href="{{ route('stores.favorite', $fav->favoriteable_id) }}" class="">
        削除
      </a>
      </div>
      @endforeach
@endsection