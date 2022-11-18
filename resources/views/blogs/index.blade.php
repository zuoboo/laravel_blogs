@extends('layouts.default')
@section('title', 'ブログ一覧')

@section('content')
<section class="bg-gray-100 pt-2">
    <div class="container mx-auto">
        <p class="text-left px-4 pt-2 text-gray-400"><a href="#" class="text-blue-600 hover:underline">ホーム</a><span class="px-2">&gt</span>ブログ</p>
        <p class="text-center pt-10 text-2xl">ブログ</p>
        <h1 class="mt-2 text-4xl font-bold font-heading text-center h-32">最新の情報をお知らせします！</h1>
    </div>
</section>

<section class="pb-24">
    <div class="container px-4 mx-auto">
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
                        <span class="py-2 px-10 mt-56 absolute left-0 bottom-0 text-xs text-gray-400 px-2 border border-white bg-gray-100 uppercase">{{ $blog->category->name }}</span>
                        <a href=""><img class="w-full h-56 object-cover" src="{{ asset('storage/' . $blog->image) }}" alt=""></a>
                        <time class="block text-xs text-gray-500 text-right pt-1 pr-2">{{ $blog->created_at }}</time>
                    </div>
                    <div class="pt-2 pb-4 px-4">
                        <a href="#">
                            <h1 class="mb-2 text-2xl font-semibold font-heading text-left">{{ $blog->title }}</h1>
                            <p class="mb-6 text-gray-500 leading-relaxed text-left truncate">{{ mb_substr($blog->body, 0, 15)}}</p>
                        </a>
                        <div class="flex justify-between">
                            <ul class="flex">
                                <li class="bg-gray-100 text-gray-400 text-xs mr-2 py-1 px-2"></li>
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
        <div class="mt-4">
            {{ $blogs->links() }}
        </div>
    </div>
</section>
@endsection
