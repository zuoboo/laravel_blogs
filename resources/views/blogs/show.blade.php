@extends('layouts.default')
@section('title', 'ブログ詳細')

@section('content')
    <section class="bg-gray-100 pt-2">
        <div class="container mx-auto">
            <p class="text-left px-4 pt-2 text-gray-400"><a href="/" class="text-blue-600 hover:underline">ホーム</a><span
                    class="px-2">&gt</span><a href="/blogs" class="text-blue-600 hover:underline">ブログ</a><span
                    class="px-2">&gt</span>{{ $blog->title }}</p>
            <h1 class="mt-2 text-4xl font-bold font-heading h-40 text-center p-12">{{ $blog->title }}</h1>
        </div>
    </section>

    <section>
        <div class="container mx-auto">
            <div class="my-8 pb-4 border-b">
                {{-- <p class="text-lg text-left">カテゴリ</p>
                <ul class="flex text-center pt-2">
                    @foreach($categories as $category)
                    <li class="bg-gray-100 text-gray-400 py-1 px-3 mr-3"><a href="#">{{ $category->name }}</a></li>
                    @endforeach
                </ul> --}}
            </div>
            <div>
                <img class="mb-12 rounded object-cover mx-auto" src="{{ asset('storage/' . $blog->image) }}" alt="">
            </div>
            <p class="border-t pt-2 text-gray-500 leading-loose">{{ $blog->body }}</p>
        </div>
    </section>

    <section class="mt-24">
        <div class="container mx-auto">
            <h2 class="border-t pt-4 mb-2 leading-tight font-medium font-heading text-2xl">この記事を書いたスタッフ</h2>
            <div class="mb-10 pt-5 flex">
                <img src="{{ asset('storage/' . $blog->user->image) }}" alt=""
                    class="h-40 h-40 rounded-full shadow">
                <div class="pl-10">
                    <p class="pt-3">{{ $blog->user->name }}</p>
                    <p class="pt-3 text-gray-400">{{ $blog->user->introduction }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-16 pb-24">
        <div class="container mx-auto">
            <h3 class="border-t pt-4 mb-2 leading-tight font-medium font-heading text-center text-2xl">このスタッフが書いた記事</h3>
            <div class="flex flex-wrap -mx-3 pt-4">
                @foreach ($blogs as $blog)
                    @if ($user_name == $blog->user->name)
                        <article class="w-full md:w-1/2 lg:w-1/3 p-3">
                            <div class="border rounded-lg overflow-hidden shadow">
                                <div class="relative h-52">
                                    <span
                                        class="py-2 px-10 mt-56 absolute left-0 bottom-0 text-xs text-gray-400 px-2 border border-white bg-gray-100 uppercase">{{ $blog->category->name }}</span>
                                    <a href="{{ route('blogs.show', ['blog' => $blog->id]) }}"><img
                                            class="w-full h-56 object-cover" src="{{ asset('storage/' . $blog->image) }}"
                                            alt=""></a>
                                    <time
                                        class="block text-xs text-gray-500 text-right pt-1 pr-2">{{ $blog->created_at->format('Y年m月d日') }}</time>
                                </div>
                                <div class="pt-2 pb-4 px-4">
                                    <a href="#">
                                        <h1 class="mb-2 text-2xl font-semibold font-heading text-left">{{ $blog->title }}
                                        </h1>
                                        <p class="mb-6 text-gray-500 leading-relaxed text-left truncate">
                                            {{ mb_substr($blog->body, 0, 15) }}</p>
                                    </a>
                                    <div class="flex justify-between">
                                        <ul class="flex">
                                            @foreach ($blog->menus as $menu)
                                            <li class="bg-gray-100 text-gray-400 text-xs mr-2 py-1">{{ $menu->name }}</li>
                                            @endforeach
                                        </ul>
                                        <p class="font-medium font-semibold">{{ $blog->user->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
