<nav class="navbar navbar-expand-md navbar-light bg-light nagoyameshi-navbar">
  <div class="container-fluid">
    <div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/logo.png') }}" class="img-logo" alt="NAGOYAMESHI">
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('mypage') }}">マイページ</a>
          </li>
        @endguest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('company') }}">会社情報</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
