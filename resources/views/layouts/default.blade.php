<!DOCTYPE html>
<html lang="ja">

<head>
    <title>@yield('title', 'OZCAFE')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="/css/tailwind/tailwind.min.css">
    <link rel="stylesheet" href="/css/animate/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/animate/style.css" />
    <link rel="stylesheet" href="/css/loader/loader.css" />
    <link rel="stylesheet" href="/css/mobile/style.css" />

    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">

</head>

<body class="antialiased bg-body text-body font-body">
    <div id="global-container">
        <div id="container">
            <!-- ▼▼▼▼共通ヘッダー▼▼▼▼ -->
            <header class="header">
                <div class="container px-4 mx-auto">
                    <nav class="flex items-center justify-between py-6">
                        <a class="text-3xl font-semibold leading-none" href="/">OZCAFE</a>
                        <ul class="hidden lg:flex ml-12 mr-auto space-x-12">
                            <li><a class="text-sm text-blueGray-400 hover:text-blueGray-500" href="/blogs">ブログ</a></li>
                            <li><a class="text-sm text-blueGray-400 hover:text-blueGray-500" href="/menus">メニュー</a>
                            </li>
                            <li><a class="text-sm text-blueGray-400 hover:text-blueGray-500" href="/notices">お知らせ</a>
                            </li>
                        </ul>
                        <div class="hidden lg:flex">
                            <a class="mr-2 inline-block px-4 py-3 text-xs text-blue-500 hover:text-blue-600 leading-none border border-blue-200 hover:border-blue-300 rounded"
                                href="/contact">お問い合わせ</a>
                            <a class="inline-block px-4 py-3 text-xs font-semibold leading-none bg-blue-500 hover:bg-blue-600 text-white rounded"
                                href="/#access">アクセス</a>
                        </div>
                    </nav>
                </div>
                <button class="mobile-menu__btn mr-8">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </header>

            <!-- ▲▲▲▲共通ヘッダー▲▲▲▲　-->

            <!-- ▼▼▼▼ページ毎の個別内容▼▼▼▼　-->
            <main>
                <div class="mt-24"></div>
                @yield('content')
            </main>
            <!-- ▲▲▲▲ページ毎の個別内容▲▲▲▲　-->

            <!-- ▼▼▼▼共通フッター▼▼▼▼　-->
            <footer class="bg-black">
                <div class="px-4 container mx-auto p-10 flex justify-between">
                    <div class="text-white text-left">
                        <h2 class="text-xl font-semibold">OZCAFE</h2>
                        <p>〒795-0012</p>
                        <p>愛媛県大洲市大洲</p>
                        <p>000-1111-2222</p>

                    </div>

                    <ul class="text-white text-left md:flex flex-wrap flex-col h-12 md:w-128">
                        <li class="ml-6"><a href="/" class="hover:underline">ホーム</a></li>
                        <li class="ml-6"><a href="/blogs" class="hover:underline">ブログ</a></li>
                        <li class="ml-6"><a href="/menus" class="hover:underline">メニュー</a></li>
                        <li class="ml-6"><a href="/notices" class="hover:underline">お知らせ</a></li>
                    </ul>
                </div>
            </footer>
            <!-- ▲▲▲▲共通フッター▲▲▲▲　-->
        </div>
        {{-- レスポンシブ対応 --}}
        <nav class="mobile-menu">
            <ul class="mobile-menu__main">
                <li class="mobile-menu__item">
                    <a class="mobile-menu__link" href="/blogs">
                        <span class="main-title">Blog</span>
                        <span class="sub-title">お店の様子をお届け</span>
                    </a>
                </li>
                <li class="mobile-menu__item">
                    <a class="mobile-menu__link" href="/menus">
                        <span class="main-title">Menu</span>
                        <span class="sub-title">新メニューも続々登場！</span>
                    </a>
                </li>
                <li class="mobile-menu__item">
                    <a class="mobile-menu__link" href="/notices">
                        <span class="main-title">Information</span>
                        <span class="sub-title">定休日などをお知らせ</span>
                    </a>
                </li>
                <li class="mobile-menu__item">
                    <a class="mobile-menu__link" href="/contact">
                        <span class="main-title">Contact</span>
                        <span class="sub-title">気軽にお問合せください</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <script src="/js/pace.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/mobile.js"></script>
</body>

</html>
