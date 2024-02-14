 @extends('layouts.app')

@section('content')
<div class="container-fluid top-container">
        <div class="row justify-content-center align-items-center" style="height: 70vh">
            <div class="col-md-6 text-center mx-auto">
                <h1 class="display-3">NAGOYAMESHI</h1>
                <p class="lead">名古屋のB級グルメ</p>

<!-- カテゴリ・店舗名フォーム -->
<form>
  <select name="category_id">
    <option disabled selected value>カテゴリを選択</option>
    @foreach ($categories as $category)
    <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
  </select>
  <input type="name" name="name">
  <button type="submit">検索</button>
</form>

                
            </div>
        </div>
    </div>

@endsection
