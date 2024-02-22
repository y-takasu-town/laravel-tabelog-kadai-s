@extends('layouts.app')

@section('content')

  <!-- 予約完了時にメッセージを表示 -->
    @if (session('success'))
    <div class="alert alert-warning">
      {{ session('success') }}
    </div>
  @endif

  <!-- カテゴリ・店舗名フォーム -->
  <div class="py-4 text-center">
    <form class="mb-4">
        <select name="category_id">
          <option disabled selected value>カテゴリを選択</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
        <input type="name" name="name" placeholder="キーワードを入力">
        <button type="submit" class="btn nagoyameshi-submit-button">検索</button>
    </form>

    <!-- ソート機能 -->
    <div>
      並び替え
      @sortablelink('price', '価格帯')
   </div>
  </div>

  <!-- 店舗一覧表示 -->
  <div class="row">
    <div class="col text-center">
      @foreach ($stores as $store)
        <div class="nagoyameshi-store-flame">
          <h3 class="mb-2 nagoyameshi-store-name">{{ $store->name }}</h3>
          <a href="{{route('stores.show',$store)}}">
            @if ($store->image !== "")
              <img src="{{ asset($store->image) }}" class="img-thumbnail">
            @else
              <img src="{{ asset('img/dummy2.png')}}" class="img-thumbnail">
            @endif
          </a>
          <div class="nagoyameshi-store-description">
            <p>価格帯： {{$store->price}}</p>
            <p>住所： {{$store->address}}</p>
            <div class="">
              @foreach($store->category as $category)
                <div class="badge text-bg-success d-inline-block">
                  <p>#{{$category->name}}</p> 
                </div>
              @endforeach
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
{{ $stores->links() }}

@endsection