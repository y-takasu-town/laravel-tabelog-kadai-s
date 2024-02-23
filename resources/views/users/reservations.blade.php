@extends('layouts.app')

@section('content')
  <nav>
    <a href="{{ route('mypage') }}" class="link-secondary text-decoration-none">マイページ</a> > 予約一覧
  </nav>

  <div class="container">
   <div class="row justify-content-center">
     <div class="col-md-5">
       <h3 class="mt-3 mb-3 text-center">予約一覧</h3>

        @if($reservations->count() == 0)
          <p>予約情報はありません。</p>
        @else
            @foreach ($reservations as $reservation)
            <div class="card mb-3">
              <h5 class="card-header text-center">
                <a href="{{route('stores.show',$reservation->store_id)}}"class="text-decoration-none text-nowrap fw-bold link-body-emphasis">{{$reservation->store->name}}</a>
              </h5>
                <div class="card-body">
                  <p class="card-text">予約時間： {{ $reservation->reservation_time}}</p>
                  <p class="card-text">予約人数： {{ $reservation->num_of_people}}名</p>
                  <form action="{{route('reservations.destroy', $reservation)}}" method="post" onsubmit="return confirm('予約をキャンセルします。よろしいですか？');" class="position-absolute bottom-0 end-0">
                    @csrf
                    <button type="submit" class="btn btn-link d-flex justify-content-center nagoyameshi-login-text">キャンセルする</button>
                  </form>
                </div>
              </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>

@endsection