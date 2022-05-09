<nav>
    <a href="/">Peach</a>

    <ul class="">

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
                <div class="">
                    <a href="{{ route('recruits.create') }}"
                        class="nav-link inline-flex items-center w-full px-6 py-3 text-xl font-medium leading-4 text-white bg-pink-500 md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-pink-400 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-pink-500">募集する</a>
                </div>
            </li>
        @endauth

        @auth
            <li class="nav-item">
                通知
            </li>
        @endauth

        @auth
            <li class="nav-item">
                メッセージ
            </li>
        @endauth

        @auth
            <li class="nav-item">
                {{-- <a href="{{ route() }}">マイページ</a> --}}
            </li>
        @endauth

        @auth
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link">アイコン:)</a>
                <div class="">
                    {{-- <button class="" type="button" onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
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
