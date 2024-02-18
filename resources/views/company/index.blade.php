@extends('layouts.app')

@section('content')
  <div class="text-center">
    <h1>会社情報</h1>
    <div class="row">
      <div class="p-5">  
        <p>会社名　{{ $company->name }}</p>
        <p>〒{{ $company->postal_code}}　{{ $company->address}}</p>
        <p>代表者　{{ $company->representative}}</p>
        <p>メール　{{ $company->email}}</p>
      </div>
    </div>
    <img src="{{ asset('img/logo.png') }}" width="150">
  </div>
  @endsection