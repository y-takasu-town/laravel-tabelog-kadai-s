@foreach ($stores as $store)
  {{ $store->name }}
@endforeach

<!-- 予約完了時にメッセージを表示 -->
@if (session('sucsess'))
  {{ session('success') }}
@endif