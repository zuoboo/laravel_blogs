@extends('layouts.default')
@section('title', 'トップページ')

@section('content')
    <section class="bg-gray-100">
        <div class="container mx-auto py-40 relative">
            <h1 class="mt-2 text-4xl font-bold font-heading text-center">葵CAFEで至福のひとときを過ごしませんか？</h1>
            <p class="text-center pt-5">季節に合ったメニューをご用意し、<br>
                皆様のご来店をお待ちしております。<br>
                </p>
            <div class="absolute right-0 bottom-0 transform translate-y-16 w-40">
                <a href="#"><img src="/images/index/food.png" alt="" class="shadow-lg"></a>
            </div>
        </div>
    </section>

    <section class="mt-16">
        <div class="container mx-auto">
            <p class="text-center text-2xl">特徴</p>
            <h2 class="mt-2 font-bold font-heading text-center text-3xl">安心して楽しんで頂くための3つの徹底ポイント</h2>
        </div>

        <div class="flex flex-wrap -m-3 container mx-auto pt-8">
            <div class="w-full lg:w-1/3 p-3">
                <div class="bg-gray-100 rounded shadow">
                    <div class="flex py-10 px-6">
                        <img class="w-20 h-20 object-cover rounded-full" src="/images/index/foliage-plant.jpg"
                            alt="">
                        <div class="ml-4 w-56">
                            <h3 class="mb-1 text-2xl font-heading text-left text-blue-500">清潔な環境</h3>
                            <p class="text-left text-gray-500 text-sm">2022年2月にリニューアル!! <br>24時間常に換気<br> 最新型空気清浄機を設置</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/3 p-3">
                <div class="bg-gray-100 rounded shadow">
                    <div class="flex py-10 px-6">
                        <img class="w-20 h-20 object-cover rounded-full" src="/images/index/sanitizer.jpg" alt="">
                        <div class="ml-4 w-56">
                            <h3 class="mb-1 text-2xl font-heading text-left text-blue-500">衛生管理</h3>
                            <p class="text-left text-gray-500 text-sm">スタッフの検温<br> マスクの常時着用<br> 1時間毎に全ての設備を消毒</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/3 p-3">
                <div class="bg-gray-100 rounded shadow">
                    <div class="flex py-10 px-6">
                        <img class="w-20 h-20 object-cover rounded-full" src="/images/index/terasu.png"
                            alt="">
                        <div class="ml-4 w-56">
                            <h3 class="mb-1 text-2xl font-heading text-left text-blue-500">広々とした空間</h3>
                            <p class="text-left text-gray-500 text-sm">テラス席をご用意してお待ちしております！<br><br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-24 container mx-auto">
        <p class="text-center text-2xl">お知らせ</p>
        <h2 class="mt-2 font-bold font-heading text-center text-3xl">営業時間や定休日などの情報をお知らせ</h2>

        <ul class="mt-8">
            @foreach ($notices as $notice )
            <li class="flex py-4 border-t border-b">
                <p class="font-bold w-40">{{ $notice->updated_at->format('Y年m月d日') }}</p>
                    <div class="text-center bg-gray-100 text-gray-400 py-3 px-4 w-40">{{ config("category.$notice->category") }}</div>
                    <a href="{{ route('notices.show', ['notice' => $notice->id ])}}" class="ml-4 text-blue-500">{{ $notice->title }}</a>
            </li>
            @endforeach
        </ul>
        <div class="mt-8 text-center">
            <a href="/notices"
                class="inline-block text-xs text-white font-semibold leading-none rounded py-4 text-blue-500 border-solid bg-white border-blue-500 border-2 px-16 hover:text-white hover:bg-blue-500">もっと見る</a>
        </div>
    </section>

    <section class="mt-24">
        <div class="container mx-auto">
            <p class="text-center text-2xl">ブログ</p>
            <h2 class="mt-2 font-bold font-heading text-center text-3xl">ほぼ毎日お店の様子をお届け！！</h2>

            <div class="my-8 pb-4 border-b">
                <p class="text-lg text-left">カテゴリ / ねこちゃん</p>
                <ul class="flex text-center pt-2">
                    <li class="bg-gray-100 text-gray-400 py-1 px-3 mr-3">カテゴリ</li>
                    <li class="bg-gray-100 text-gray-400 py-1 px-3 mr-3"><a href="#">カテゴリ</a></li>
                    <li class="bg-gray-100 text-gray-400 py-1 px-3 mr-3"><a href="#">カテゴリ</a></li>
                    <li class="bg-gray-100 text-gray-400 py-1 px-3 mr-3"><a href="#">＃ねこちゃん</a></li>
                    <li class="bg-gray-100 text-gray-400 py-1 px-3 mr-3"><a href="#">＃ねこちゃん</a></li>
                    <li class="bg-gray-100 text-gray-400 py-1 px-3"><a href="#">＃ねこちゃん</a></li>
                </ul>
            </div>
            <div class="flex flex-wrap -mx-3">
                @foreach ($blogs as $blog)
                <article class="w-full md:w-1/2 lg:w-1/3 p-3">
                        <div class="border rounded-lg overflow-hidden shadow">
                            <div class="relative h-52">
                                <span
                                    class="absolute text-xs text-gray-400 px-2 border border-white bg-gray-100 uppercase py-2 px-10 left-0 bottom-0">{{ $blog->category->name}}</span>
                                <a href=""><img class="w-full h-56 object-cover"
                                    src="{{ asset('storage/' . $blog->image) }}" alt=""></a>
                                <time class="block text-xs text-gray-500 text-right pt-1 pr-2">{{ $blog->created_at }}</time>
                            </div>
                            <div class="pt-2 pb-4 px-4">
                                <a href="#">
                                    <h1 class="mb-2 text-2xl font-semibold font-heading text-left">{{ $blog->title }}</h1>
                                    <p class="mb-6 text-gray-500 leading-relaxed text-left truncate">
                                        {{ mb_substr($blog->body, 0, 15) }}</p>
                                </a>
                                <div class="flex justify-between">
                                    <ul class="flex">
                                        {{-- <li class="bg-gray-100 text-gray-400 text-xs mr-2 py-1 px-2">{{ $blog->pivot->menu_id }}</li> --}}
                                        <li class="bg-gray-100 text-gray-400 text-xs py-1 px-2 mr-2">＃ねこちゃん</li>
                                        <li class="bg-gray-100 text-gray-400 text-xs py-1 px-2">＃ねこちゃん</li>
                                    </ul>
                                    <p class="font-medium font-semibold">{{ $blog->user->name }}</p>
                                </div>
                            </div>
                        </div>
                </article>
                @endforeach
            </div>
            <div class="mt-8 text-center">
                <a href="/blogs"
                    class="inline-block text-xs text-white font-semibold leading-none rounded py-4 text-blue-500 border-solid bg-white border-blue-500 border-2 px-16 hover:text-white hover:bg-blue-500">もっと見る</a>
            </div>
        </div>
    </section>

    <section id="access" class="mt-24 pb-24 bg-gray-100">
        <div class="container mx-auto">
            <p class="text-center pt-10 text-2xl">アクセス</p>
            <h2 class="mt-2 font-bold font-heading text-center text-3xl h-24">ご来店をお待ちしております！</h2>
            <div class="md:flex justify-center">
                <div class="">
                    <img class="rounded mx-auto" src="/images/map.jpg" alt="">
                </div>
                <div class="text-left lg:ml-8 px-8">
                    <p class="font-bold text-3xl pb-5">葵CAFE</p>
                    <dl>
                        <dt class="text-xl font-medium">営業時間</dt>
                        <dd class="pl-12 text-lg"><span class="mr-6">平日</span>11:30〜16:00<span class="ml-6"></span></dd>
                        <dd class="pl-12 text-lg"><span class="mr-1">土日祝 </span>11:00〜16:30<span class="ml-6"></span></dd>
                        <dt class="mt-5 text-xl font-medium">住所</dt>
                        <dd class="text-lg pl-12">〒795-0012<br>愛媛県大洲市大洲392</dd>
                        <dt class="mt-5 text-xl font-medium">最寄り駅から</dt>
                        <dd class="pl-12 text-lg">伊予大洲駅<span class="ml-6">徒歩10分</span></dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="flex mx-auto bg-white py-4 mt-10 md:w-192">
            <div class="text-left mx-auto">
                <p class="text-lg">なにかあればお気軽にお問い合わせください！</p>
                <p><a href="#" class="text-blue-600 hover:underline">よくあるご質問</a>もご用意しています</p>
            </div>
            <div class="mx-auto">
                <a href="/contact"
                    class="inline-block text-xs text-white font-semibold leading-none rounded py-4 text-blue-700 border-solid bg-white border-blue-700 border-2 px-16 hover:text-white hover:bg-blue-700">お問い合わせ</a>
            </div>
        </div>
    </section>
@endsection
