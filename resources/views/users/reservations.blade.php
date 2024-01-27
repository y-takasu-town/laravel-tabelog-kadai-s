@if($reservations->count() == 0)
  <p>予約情報はありません。</p>
@else
    @foreach ($reservations as $reservation)
      {{ $reservation->store->name }}
      <form action="{{route('reservations.destroy', $reservation)}}" method="post" onsubmit="return confirm('予約をキャンセルします。よろしいですか？');">
      @csrf
      @method('DELETE')  
      <button type="submit">キャンセルする</button>
    </form>
  @endforeach
@endif