<nav>
    <a href="/">Peach</a>
<<<<<<< HEAD
<<<<<<< HEAD
    <ul>
=======
    <ul class="">gin/develop
>>>>>>> b8cb8ad... make: navi
=======
    <ul class="">
>>>>>>> c00d977... make: navi page

        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
        </li>
        @endguest

        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">ログイン</a>
        </li>
        @endguest

        @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('recruits.create') }}">募集する</a>
        </li>
        @endauth

        @auth
        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link">アイコン:)</a>
            <div class="">
{{--                 <button class="" type="button" onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
                    マイページ
                </button> --}}
                <button form="logout-button" class="" type="submit">
                    ログアウト
                </button>
            </div>
        </li>
        <form id="logout-button" method="POST" action="{{ route('logout') }}">
            @csrf
        </form>
        <!-- Dropdown -->
        @endauth

    </ul>
</nav>
