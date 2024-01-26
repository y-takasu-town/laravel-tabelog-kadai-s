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
  @endforeach

  <!-- 予約完了時にメッセージを表示 -->
  @if (session('success'))
    {{ session('success') }}
  @endif

@endsection