@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
            <h3 class="mt-3 mb-3 text-center">レビュー投稿</h3>
            @auth
                <form method="POST" action="{{route('reviews.store')}}">
                    @csrf
                    @error('content')
                        <strong>レビュー内容を入力してください</strong>
                    @enderror
                    <textarea name='content' class="form-control"></textarea>
                    <input type="hidden" name="store_id" value="{{$store->id}}">
                    <button type="submit" class="mt-3 btn nagoyameshi-submit-button w-100">レビューを追加</button>
                </form>
            @endauth
        </div>
    </div>
</div>
@endsection