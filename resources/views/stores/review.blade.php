@extends('layouts.app')

@section('content')

@auth
    <form method="POST" action="{{route('reviews.store')}}">
        @csrf
        <h4>レビュー</h4>
        @error('content')
            <strong>レビュー内容を入力してください</strong>
        @enderror
        <textarea name='content' class=""></textarea>
        <input type="hidden" name="store_id" value="{{$store->id}}">
        <button type="submit" class="">レビューを追加</button>
    </form>
@endauth