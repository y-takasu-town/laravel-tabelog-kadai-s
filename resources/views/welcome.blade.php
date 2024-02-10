<div id="top-font">
    <h2>名古屋B級グルメに特化したレビューアプリ</h2>
    <h1>NAGOYAMESHI</h1>
</div>

<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">店舗一覧</a>

            <!--　ログインしている人のみ表示される店舗検索フォームを表示 -->

            

        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">会員登録</a>
            @endif
        @endauth
    <a href="{{route('company')}}">会社情報</a>
 </div>
