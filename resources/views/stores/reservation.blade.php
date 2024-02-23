@extends('layouts.app')

@section('content')

    <!-- 予約内容に不備がある場合にエラーを表示する -->
    @if (isset($errors))
        @foreach ($errors->all() as $error)
            <div class="alert alert-warning">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <h1 class="fw-bold text-center mb-3">{{$store->name}}</h1>
            <div class="col-md-5">

                <!-- 予約機能 -->
                <form action="{{ route('reservations.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="store_id" value="{{ $store->id }}">

                    <!-- 予約日 -->
                    <div class="form-group mb-3">
                        <label for="reservation_date" class="form-lavel">予約日</label>
                        <input type="date" name="reservation_date" class="form-control" required value="{{old('reservation_date')}}">
                    </div>

                    <!-- 予約時間 -->
                    <div class="form-group mb-3">
                        <label for="reservation_time" class="form-lavel">予約時間</label>
                        <select name="reservation_time" class="form-select" required>
                            @for ($i = 0; $i < 24 * 2; $i++)
                                @php
                                    $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i * 30);
                                @endphp
                                @if(old('reservation_time') && old('reservation_time') == $time->format('H:i'))
                                <option value="{{ $time->format('H:i') }}" selected>{{ $time->format('H:i') }}</option>
                                @else
                                <option value="{{ $time->format('H:i') }}">{{ $time->format('H:i') }}</option>
                                @endif
                            @endfor
                        </select>
                    </div>

                    <!-- 予約人数 -->
                    <div class="form-group mb-3">
                        <label for="num_of_people" class="form-lavel">予約人数</label>
                        <input type="number" name="num_of_people" class="form-control" required min="1" value="{{old('num_of_people')}}">
                    </div>

                    <button type="submit" class="btn nagoyameshi-submit-button w-100">予約する</button>
                </form>
            </div>
        </div>
    </div>
@endsection