@extends('layouts.admin')

@section('content')
    <section class="py-8">
        <div class="container px-4 mx-auto">
            <div class="py-4 bg-white rounded">
                <form action="{{ route('admin.notices.update', ['notice' => $notice->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex px-6 pb-4 border-b">
                        <h3 class="text-xl font-bold">お知らせ編集</h3>
                        <div class="ml-auto">
                            <button type="submit"
                                class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">更新</button>
                        </div>
                    </div>

                    <div class="pt-4 px-6">
                        <!-- ▼▼▼▼エラーメッセージ▼▼▼▼　-->
                        @if ($errors->any())
                            <div class="mb-8 py-4 px-6 border border-red-300 bg-red-50 rounded">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-400">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- ▲▲▲▲エラーメッセージ▲▲▲▲　-->
                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-2" for="title">タイトル</label>
                            <input id="title" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded"
                                type="text" name="title" value="{{ old('title', $notice->title) }}">
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-2" for="category">カテゴリ</label>
                            <div class="flex">
                                <select id="category"
                                    class="appearance-none block pl-4 pr-8 py-3 mb-2 text-sm bg-white border rounded"
                                    name="category">
                                    @foreach (config('category') as $category_id => $category_name)
                                        <option value="{{ $category_id }}"
                                            {{ $notice->category == $category_id ? 'selected' : '' }}>{{ $category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div
                                    class="pointer-events-none transform -translate-x-full flex items-center px-2 text-gray-500">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewbox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-2" for="body">内容</label>
                            <textarea id="body" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="body"
                                rows="5">{{ old('body', $notice->body) }}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
