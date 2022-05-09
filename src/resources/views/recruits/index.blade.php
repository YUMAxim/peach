@extends('app')

@section('title', '募集一覧')

@section('content')
    @include('nav')
    @include('sample')
    @foreach ($recruits as $recruit)
        @include('recruits.card')
    @endforeach
<!-- Section 2 -->
<section class="w-full px-6 pb-12 antialiased bg-white">
    <div class="mx-auto max-w-7xl">

        <nav class="relative z-50 h-24 select-none" x-data="{ showMenu: false }">
            <div
                class="container relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium border-b border-gray-200 md:overflow-visible lg:justify-center sm:px-4 md:px-2">
                <div class="flex items-center justify-start w-1/4 h-full pr-4">
                    <a href="#_" class="inline-block py-4 md:py-0">
                        <span class="p-1 text-xl font-black leading-none text-gray-900"><span
                                class="">Peach</span><span class="text-pink-500">.</span></span>
                    </a>
                </div>
                <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex"
                    :class="{'flex fixed': showMenu, 'hidden': !showMenu }">
                    <div
                        class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
                        <a href="#_"
                            class="inline-flex items-center block w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden">tails<span
                                class="text-pink-500">.</span></a>
                        <div
                            class="flex flex-col items-start justify-center w-full space-x-6 text-center lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center">
                            <a href="#_"
                                class="inline-block w-full py-2 mx-0 ml-6 font-medium text-left text-pink-500 md:ml-0 md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center">ホーム</a>
                            <a href="#_"
                                class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-pink-500 lg:mx-3 md:text-center">特徴</a>
                            <a href="#_"
                                class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-pink-500 lg:mx-3 md:text-center">使い方</a>
                            <a href="#_"
                                class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-pink-500 lg:mx-3 md:text-center">お問い合わせ</a>
                            <a href="#_"
                                class="absolute top-0 left-0 hidden py-2 mt-6 ml-10 mr-2 text-gray-600 lg:inline-block md:mt-0 md:ml-2 lg:mx-3 md:relative">
                                <svg class="inline w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" class=""></path>
                                </svg>
                            </a>
                        </div>
                        <div
                            class="flex flex-col items-start justify-end w-full pt-4 md:items-center md:w-1/3 md:flex-row md:py-0">
                            <a href="#"
                                class="w-full px-6 py-2 mr-0 text-gray-700 md:px-0 lg:pl-2 md:mr-4 lg:mr-5 md:w-auto">ログイン</a>
                            <a href="#_"
                                class="inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-white bg-pink-500 md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-pink-400 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-pink-500">登録する</a>
                        </div>
                    </div>
                </div>
                <div @click="showMenu = !showMenu"
                    class="absolute right-0 flex flex-col items-center items-end justify-center w-10 h-10 bg-white rounded-full cursor-pointer md:hidden hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-700" x-show="!showMenu" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="w-6 h-6 text-gray-700" x-show="showMenu" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </div>
            </div>
        </nav>

        <!-- Main Hero Content -->
        <div class="container max-w-lg px-4 py-32 mx-auto text-left md:max-w-none md:text-center">
            <h1
                class="text-5xl font-extrabold leading-10 tracking-tight text-left text-gray-900 md:text-center sm:leading-none md:text-6xl lg:text-7xl">
                <span class="inline md:block">あなただけの</span> <span
                    class="relative mt-2 text-transparent bg-clip-text bg-gradient-to-br from-pink-500 to-pink-400 md:inline-block">絵本</span><span
                    class="inline md:block">を作ろう</span></h1>
            <div class="mx-auto mt-5 text-gray-500 md:mt-12 md:max-w-lg md:text-center lg:text-lg">
                作りたい絵本の募集を作成し、<br>イラストレーターや作家に依頼するだけで簡単に作れる！</div>
            <div class="flex flex-col items-center mt-12 text-center">
                <span class="relative inline-flex w-full md:w-auto">
                    <a href="#_"
                        class="inline-flex items-center justify-center w-full px-8 py-4 text-base font-bold leading-6 text-white bg-pink-500 border border-transparent rounded-full md:w-auto hover:bg-pink-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                        登録する
                    </a>
                </span>
                <a href="#" class="mt-3 text-sm text-pink-500">もっと知る</a>
            </div>
        </div>
        <!-- End Main Hero Content -->

    </div>
</section>

<!-- Section 3 -->
<section class="px-2 py-32 bg-white md:px-0">
    <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
        <div class="flex flex-wrap items-center sm:-mx-3">
            <div class="w-full md:w-1/2 md:px-3">
                <div
                    class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
                    <h1
                        class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                        <span class="block xl:inline">作りたい絵本を</span>
                        <span class="block text-pink-500 xl:inline">とってもお手軽に！</span>
                    </h1>
                    <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">
                        コンセプトを募集フォームに入力してクリエイターに依頼するだけで完成！</p>
                    <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                        <a href="#_"
                            class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-pink-500 sm:mb-0 hover:bg-pink-600 sm:w-auto rounded-none rounded-md">
                            無料で登録
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                        <a href="#_"
                            class="flex items-center px-6 py-3 text-gray-500 bg-gray-100 hover:bg-gray-200 hover:text-gray-600 rounded-none rounded-md">
                            もっと知る
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <div class="w-full h-auto overflow-hidden shadow-xl rounded-none rounded-xl">
                    <img src="https://cdn.devdojo.com/images/november2020/hero-image.jpeg" class="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 4 -->
<section class="py-20 bg-white">
    <div class="container max-w-6xl mx-auto">
        <h2 class="text-4xl font-bold tracking-tight text-center">Our Features</h2>
        <p class="mt-2 text-lg text-center text-gray-600">Check out our list of awesome features below.</p>
        <div class="grid grid-cols-4 gap-8 mt-10 sm:grid-cols-8 lg:grid-cols-12 sm:px-8 xl:px-0">

            <div
                class="relative flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 overflow-hidden bg-gray-100 rounded-none rounded-xl">
                <div class="p-3 text-white bg-pink-500 rounded-none rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M5 8v-3a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5"></path>
                        <circle cx="6" cy="14" r="3"></circle>
                        <path d="M4.5 17l-1.5 5l3 -1.5l3 1.5l-1.5 -5"></path>
                    </svg>
                </div>
                <h4 class="text-xl font-medium text-gray-700">Certifications</h4>
                <p class="text-base text-center text-gray-500">Each of our plan will provide you and your team with
                    certifications.</p>
            </div>

            <div
                class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 rounded-none rounded-xl">
                <div class="p-3 text-white bg-pink-500 rounded-none rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M18 8a3 3 0 0 1 0 6"></path>
                        <path d="M10 8v11a1 1 0 0 1 -1 1h-1a1 1 0 0 1 -1 -1v-5"></path>
                        <path
                            d="M12 8h0l4.524 -3.77a0.9 .9 0 0 1 1.476 .692v12.156a0.9 .9 0 0 1 -1.476 .692l-4.524 -3.77h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h8">
                        </path>
                    </svg>
                </div>
                <h4 class="text-xl font-medium text-gray-700">Notifications</h4>
                <p class="text-base text-center text-gray-500">Send out notifications to all your customers to keep them
                    engaged.</p>
            </div>

            <div
                class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 rounded-none rounded-xl">
                <div class="p-3 text-white bg-pink-500 rounded-none rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                        <line x1="12" y1="12" x2="20" y2="7.5"></line>
                        <line x1="12" y1="12" x2="12" y2="21"></line>
                        <line x1="12" y1="12" x2="4" y2="7.5"></line>
                        <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                    </svg>
                </div>
                <h4 class="text-xl font-medium text-gray-700">Bundles</h4>
                <p class="text-base text-center text-gray-500">High-quality bundles of awesome tools to help you out.
                </p>
            </div>

            <div
                class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 rounded-none rounded-xl">
                <div class="p-3 text-white bg-pink-500 rounded-none rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 9l3 3l-3 3"></path>
                        <line x1="13" y1="15" x2="16" y2="15"></line>
                        <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                    </svg>
                </div>
                <h4 class="text-xl font-medium text-gray-700">Developer Tools</h4>
                <p class="text-base text-center text-gray-500">Developer tools to help grow your application and keep it
                    up-to-date.</p>
            </div>

            <div
                class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 rounded-none rounded-xl">
                <div class="p-3 text-white bg-pink-500 rounded-none rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="9.5" y1="11" x2="9.51" y2="11"></line>
                        <line x1="14.5" y1="11" x2="14.51" y2="11"></line>
                        <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
                        <path
                            d="M7 5h1v-2h8v2h1a3 3 0 0 1 3 3v9a3 3 0 0 1 -3 3v1h-10v-1a3 3 0 0 1 -3 -3v-9a3 3 0 0 1 3 -3">
                        </path>
                    </svg>
                </div>
                <h4 class="text-xl font-medium text-gray-700">Building Blocks</h4>
                <p class="text-base text-center text-gray-500">The right kind of building blocks to take your company to
                    the next level.</p>
            </div>

            <div
                class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 rounded-none rounded-xl">
                <div class="p-3 text-white bg-pink-500 rounded-none rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="15" y1="5" x2="15" y2="7"></line>
                        <line x1="15" y1="11" x2="15" y2="13"></line>
                        <line x1="15" y1="17" x2="15" y2="19"></line>
                        <path
                            d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2">
                        </path>
                    </svg>
                </div>
                <h4 class="text-xl font-medium text-gray-700">Coupons</h4>
                <p class="text-base text-center text-gray-500">Coupons system to provide special offers and discounts
                    for your app.</p>
            </div>

        </div>
    </div>
</section>

<!-- Section 5 -->
<section class="py-20 bg-white">
    <div class="px-4 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl md:text-5xl xl:text-6xl">
            The New Standard for Design
        </h2>
        <p class="max-w-md mx-auto mt-3 text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
            Use our award-winning tools to help you maximize your profits. We've uncovered the correct recipe for
            converting visitors into customers.
        </p>
        <div class="flex justify-center mt-8 space-x-3">
            <a href="#"
                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-white bg-pink-500 border border-transparent shadow hover:bg-pink-600 rounded-none rounded-md">Sign
                Up Today</a>
            <a href="#"
                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-pink-600 bg-pink-50 border border-transparent hover:bg-pink-100 rounded-none rounded-md">Learn
                more</a>
        </div>
    </div>
</section>
@endsection
