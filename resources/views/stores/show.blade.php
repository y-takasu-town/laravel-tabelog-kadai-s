@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="nagoyameshi-store-name fw-bold mb-3">
            {{$store->name}}
        </h1>

        <div class="container-fluid p-0 mb-4">
            <div class="row g-3">
                <div class="col-12 col-lg-4">
                    @if ($store->image !== "")
                        <img src="{{ asset($store->image) }}" class="w-100">
                    @else
                        <img src="{{ asset('img/dummy2.png')}}" class="w-100">
                    @endif  
                </div>
                <div class="col">
                    <p class="mb-2 border-bottom fs-5"> {{$store->description}} </p>
                    <p class="mb-2 border-bottom fs-5">価格帯： {{$store->price}} </p>
                    <p class="mb-2 border-bottom fs-5">営業時間： {{ substr($store->open_time,0,5)}}〜{{substr($store->close_time,0,5)}} </p>
                    <p class="mb-2 border-bottom fs-5">店舗休業日： {{$store->holiday}} </p>
                    <p class="mb-2 border-bottom fs-5">郵便番号： {{$store->posal_code}} </p>
                    <p class="mb-2 border-bottom fs-5">住所： {{$store->address}} </p>
                    <p class="mb-2 border-bottom fs-5">電話番号： {{$store->phone_number}} </p>
                </div>
            </div>
        </div>
        <hr>

        <div class="text-center">
            <!-- お気に入り機能 -->
            @if($store->isFavoritedBy(Auth::user()))
                <a href="{{ route('stores.favorite', $store) }}" class="mt-3 btn nagoyameshi-submit-button col-6"><i class="far fa-heart"></i>お気に入り解除</a>
            @else
                <a href="{{ route('stores.favorite', $store) }}" class="mt-3 btn nagoyameshi-submit-button col-6"><i class="fas fa-heart"></i>お気に入り</a>
            @endif
        </div>

        <!-- 予約画面へ --> 
        <div class="text-center mb-5">
            <a href="{{route('stores.reservation',$store)}}">
                <button type="submit" class="mt-3 btn nagoyameshi-submit-button col-6">予約する</button>
            </a>
        </div>

        <!-- レビュー一覧 -->
        <div class="row justify-content-center">
            <div class="col-6">
                <h4 class="text-center mb-3 fw-semibold">レビュー</h4>
                @if($reviews->count() == 0)
                    <p class="text-center">レビューはありません。<p>
                @else
                    @foreach($reviews as $review)
                        <div class="mt-3 mb-3">
                            <p class="fs-5">{{$review->content}}</p>
                            <label>{{substr($review->created_at,0,16)}}</label>
                            <label>{{$review->user->name??''}}</label>
                        </div>
                        <hr>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- 有料会員のみレビュー投稿画面へ -->
        <div class="text-center">
            <a href="{{route('stores.review',$store)}}" class="mt-3 btn nagoyameshi-submit-button col-6">レビュー投稿</a>
        </div>

    </div>

@endsection