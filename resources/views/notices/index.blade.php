@extends('layouts.default')
@section('title', 'お知らせ')

@section('content')
    <section class="bg-gray-100">
        <div class="container mx-auto">
            <p class="text-left px-4 pt-2"><a href="/" class="text-blue-600 hover:underline">ホーム</a>&gt;お知らせ</p>
            <p class="text-center pt-10 text-2xl">お知らせ</p>
            <h1 class="mt-2 text-4xl font-bold font-heading text-center h-32">営業時間や定休日などの情報をお知らせ</h1>
        </div>
    </section>
    <section class="py-20 bg-blueGray-50">
        <div class="container px-4 mx-auto">
            <ul class="mt-8">
                @foreach ($notices as $notice )
                <li class="flex py-4 border-t border-b">
                    <p class="font-bold w-40">{{ $notice->updated_at }}</p>
                        <div class="text-center bg-gray-100 text-gray-400 py-3 px-4 w-40">{{ config("category.$notice->category") }}</div>
                        <a href="{{ route('notices.show', ['notice' => $notice->id ])}}" class="ml-4 text-blue-500">{{ $notice->title }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
