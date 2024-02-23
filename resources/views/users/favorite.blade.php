@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <h3 class="mt-3 mb-3 text-center">お気に入り</h3>

    <div class="row">
      <div class="col text-center">
        @foreach ($favorites as $fav)
          <div class="nagoyameshi-store-flame">
            <h3 class="mb-2 nagoyameshi-store-name">{{ $fav->name }}</h3>
            <a href="{{route('stores.show',$fav)}}">
              @if ($fav->image !== "")
                <img src="{{ asset($fav->image) }}" class="img-thumbnail">
              @else
                <img src="{{ asset('img/dummy2.png')}}" class="img-thumbnail">
              @endif
            </a>
            <div class="nagoyameshi-store-description">
              <p>価格帯： {{$fav->price}}</p>
              <p>住所： {{$fav->address}}</p>
              <div class="">
                @foreach($fav->category as $category)
                  <div class="badge text-bg-success d-inline-block">
                    <p>#{{$category->name}}</p> 
                  </div>
                @endforeach
              </div>
            </div>
            <a href="{{ route('stores.favorite', $fav) }}" class="btn btn-link mt-3 d-flex justify-content-center nagoyameshi-login-text">
              削除
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection