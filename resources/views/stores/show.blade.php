@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="nagoyameshi-store-name">
        {{$store->name}}
    </h1>

    <div>
        <!-- お気に入り機能 -->
        @if($store->isFavoritedBy(Auth::user()))
            <a href="{{ route('stores.favorite', $store) }}"><i class="far fa-heart"></i>お気に入り解除</a>
        @else
            <a href="{{ route('stores.favorite', $store) }}"><i class="fas fa-heart"></i>お気に入り</a>
        @endif
    </div>

    <div class="container p-0 mb-4">
        <div class="row g-3">
            <div class="col-12 col-lg-4">
                @if ($store->image !== "")
                    <img src="{{ asset($store->image) }}" class="w-100">
                @else
                    <img src="{{ asset('img/dummy2.png')}}" class="w-100">
                @endif  
            </div>
            <div class="col">
                <p class="mb-2 border-bottom"> {{$store->description}} </p>
                <p class="mb-2 border-bottom">価格帯： {{$store->price}} </p>
                <p class="mb-2 border-bottom">営業時間： {{ substr($store->open_time,0,5)}}〜{{substr($store->close_time,0,5)}} </p>
                <p class="mb-2 border-bottom">郵便番号： {{$store->posal_code}} </p>
                <p class="mb-2 border-bottom">住所： {{$store->address}} </p>
                <p class="mb-2 border-bottom">電話番号： {{$store->phone_number}} </p>
                <p class="mb-2 border-bottom">店舗休業日： {{$store->holiday}} </p>
            </div>
        </div>
    </div>
    <hr>

    <!-- 予約画面へ --> 
    <div class="">
        <a href="{{route('stores.reservation',$store)}}">
            <button type="submit" class="mt-3 btn nagoyameshi-submit-button w-50">予約する</button>
        </a>
    </div>


    <br>

    <!-- レビュー一覧 -->
    @foreach($reviews as $review)
    <p>{{$review->content}}</p>
    <label>{{$review->created_at}}{{$review->user->name??''}}</label>
    @endforeach
    <br>

    <!-- 有料会員のみレビュー投稿画面へ -->
    <a href="{{route('stores.review',$store)}}">レビュー投稿</a>

</div>

@endsection