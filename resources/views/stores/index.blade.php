@extends('layouts.app')

@section('content')

  <!-- 予約完了時にメッセージを表示 -->
  @if (session('success'))
  <div class=”alert alert-warning“>
    {{ session('success') }}
  </div>
  @endif

<!-- カテゴリ・店舗名フォーム -->
<form>
  <select name="category_id">
    <option disabled selected value>カテゴリを選択</option>
    @foreach ($categories as $category)
    <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
  </select>
  <input type="name" name="name">
  <button type="submit">検索</button>
</form>


<!-- ソート機能 -->
<div>
 Sort By
 @sortablelink('id', 'id')
 @sortablelink('price', 'Price')
</div>

  @foreach ($stores as $store)
    <a href="{{route('stores.show',$store)}}">
      <h3>{{ $store->name }}</h3>
       @if ($store->image !== "")
         <img src="{{ asset($store->image) }}" class="img-thumbnail">
       @else
          <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
       @endif
    </a>
    <p>{{$store->description}}</p>
    <p>価格帯： {{$store->price}}</p>
    <p>住所： {{$store->address}}</p>

    @foreach($store->category as $category)
      <p>{{$category->name}}</p>
    @endforeach
  @endforeach


{{ $stores->links() }}

@endsection