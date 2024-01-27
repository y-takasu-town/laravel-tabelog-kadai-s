@extends('layouts.app')

@section('content')

  @foreach ($stores as $store)
  <a href="{{route('stores.show',$store)}}">
    {{ $store->name }}
  </a>
  <br>
  {{$store->description}}
  <br>
 住所： {{$store->address}}
  <br>
    @foreach($store->category as $category)
    <p>{{$category->name}}</p>
    @endforeach
  @endforeach

  <!-- カテゴリ・店舗名フォーム -->
  <form>
  <select name="category_id">
  <option disabled selected value>カテゴリを選択</option>
    @foreach ($categories as $category)
    <option value="{{ $category->id }}">{{ $category->name }}</option>
  @endforeach
  <select>
  <input type="name" name="name">
  <button type="submit">検索</button>
</form>

{{ $stores->links() }}


  <!-- 予約完了時にメッセージを表示 -->
  @if (session('success'))
    {{ session('success') }}
  @endif

@endsection