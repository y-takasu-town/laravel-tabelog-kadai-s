@extends('layouts.app')

@section('content')

<!-- 予約機能 -->
<form action="{{ route('reservations.store') }}" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <input type="hidden" name="store_id" value="{{ $store->id }}">

    <!-- 予約日 -->
    <label for="reservation_date">予約日:</label>
    <input type="date" name="reservation_date" required value="{{old('reservation_date')}}">

    <!-- 予約時間 -->
    <label for="reservation_time">予約時間:</label>
    <select name="reservation_time" required>
        @for ($i = 0; $i < 24 * 2; $i++)
            @php
                $time = \Carbon\Carbon::createFromTime(0, 0)->addMinutes($i * 30);
            @endphp
            <option value="{{ $time->format('H:i') }}">{{ $time->format('H:i') }}</option>
        @endfor
    </select>

    <!-- 予約人数 -->
    <label for="num_of_people">予約人数:</label>
    <input type="number" name="num_of_people" required min="1" value="{{old('num_of_people')}}">


    <button type="submit">予約する</button>
</form>


@if (isset($errors))
@foreach ($errors->all() as $error)
<div class="alert alert-warning">
{{ $error }}
</div>
@endforeach
@endif

@endsection