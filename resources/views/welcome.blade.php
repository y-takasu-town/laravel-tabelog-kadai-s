@extends('layouts.app')

@section('css')
<link href="{{asset('css/nagoyameshi.css')}}" rel="stylesheet">

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" style="height: 60vh">
            <div class="col-md-6 text-center mx-auto">
                <h1 class="display-3">NAGOYAMESHI</h1>
                <p class="lead">名古屋のB級グルメ</p>

                <!-- カテゴリ・店舗名フォーム -->
                <form action="{{route('stores.index')}}" method="GET">
                @csrf
                    <select name="category_id" class="w-100">
                        <option disabled selected value>カテゴリを選択</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <input type="name" name="name" class="mt-3 w-100">
                    <button type="submit" class="mt-3 btn nagoyameshi-submit-button w-100">検索</button>
                </form>

                
            </div>
        </div>
    </div>

@endsection
