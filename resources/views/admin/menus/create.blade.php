@extends('layouts.admin')

@section('content')
    <section class="py-8">
        <div class="container px-4 mx-auto">
            <div class="py-4 bg-white rounded">
                <form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex px-6 pb-4 border-b">
                        <h3 class="text-xl font-bold">メニュー登録</h3>
                        <div class="ml-auto">
                            <button type="submit"
                                class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">保存</button>
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
                            <label class="block text-sm font-medium mb-2" for="title">商品名</label>
                            <input id="name" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded"
                                type="text" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-2" for="image">画像</label>
                            <div class="flex items-end">
                                <img id="previewImage" src="/images/admin/noimage.jpg"
                                    data-noimage="/images/admin/noimage.jpg" alt="" class="rounded shadow-md w-64">
                                <input id="image" class="block w-full px-4 py-3 mb-2" type="file" accept='image/*'
                                    name="image">
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-2" for="title">価格</label>
                            <input id="price" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded"
                                type="number" name="price" value="{{ old('price') }}">
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-2" for="introduction">紹介文</label>
                            <textarea id="introduction" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="introduction"
                                rows="5">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        // ねこちゃんたち追加
        $('#js-pulldown').select2();

        // 画像プレビュー
        document.getElementById('image').addEventListener('change', e => {
            const previewImageNode = document.getElementById('previewImage')
            const fileReader = new FileReader()
            fileReader.onload = () => previewImageNode.src = fileReader.result
            if (e.target.files.length > 0) {
                fileReader.readAsDataURL(e.target.files[0])
            } else {
                previewImageNode.src = previewImageNode.dataset.noimage
            }
        })
    </script>
@endsection
