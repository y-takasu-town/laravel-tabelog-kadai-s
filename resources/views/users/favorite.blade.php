@extends('layouts.app')

@section('content')
<span>
  <a href="{{ route('mypage') }}">マイページ</a> > お気に入り
</span>

<h1>お気に入り</h1>

  @foreach ($favorites as $fav)
 <a href="{{route('stores.show', $fav->favoriteable_id)}}" class="">店舗詳細</a>
 <h5 class="">{{App\Models\Store::find($fav->favoriteable_id)->name}}</h5>
 <h6 class="">&yen;{{App\Models\Store::find($fav->favoriteable_id)->price}}</h6>

 <a href="{{ route('stores.favorite', $fav->favoriteable_id) }}" class="">
  削除
 </a>
  @endforeach
@endsection