<nav class="navbar navbar-expand-md navbar-light nagoyameshi-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{asset('img/logo.png')}}" class="img-logo">
    </a> 
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto justify-content-end">
          <!-- Authentication Links -->
          
          @guest

          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          <!-- ログインしている場合の表示 -->
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('mypage') }}">マイページ</a>
          </li>
          @endguest
          <a class="nav-link" href="{{route('company')}}">会社情報</a>
        </ul>
    </div>
  </div>
</nav>