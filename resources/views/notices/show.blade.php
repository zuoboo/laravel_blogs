@extends('layouts.default')
@section('title', 'お知らせ')

@section('content')
    <section class="bg-gray-100">
        <div class="container mx-auto">
            <h1 class="text-4xl font-bold font-heading text-center h-32 pt-10">{{ $notice->title }}</h1>
        </div>
    </section>
    <section class="py-20 bg-blueGray-50">
        <div class="container px-4 mx-auto">
            <p class="font-bold text-right">{{ $date }}</p>
            <ul class="mt-8">
                <li class="flex py-4 border-t border-b">
                        <a class="ml-4">{!! nl2br($notice->body) !!}<br><br>
                        OZCAFEオーナー</a>
                </li>
            </ul>
        </div>
    </section>
@endsection
