<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreNoticeRequest;
use App\Models\Notice;

class AdminNoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::latest('updated_at')->simplePaginate(10);
        return view('admin.notices.index', ['notices' => $notices]);
    }

    // お知らせ登録画面
    public function create()
    {

        return view('admin.notices.create');
    }

    // ブログ投稿処理
    public function store(StoreNoticeRequest $request)
    {
        $notice = new Notice($request->validated());
        $notice->save();

        return to_route('admin.notices.index')->with('success', 'お知らせを登録しました');
    }

    // 指定したIDのお知らせの編集画面
    public function edit(Notice $notice)
    {
        // dd($notice);
        return view('admin.notices.edit', compact('notice'));
    }


    // 指定したIDのブログの編集画面
    public function update(StoreNoticeRequest $request, $id)
    {
        // dd($request);

        $notice = Notice::findOrFail($id);
        $updateData = $request->validated();

        $notice->update($updateData);

        return to_route('admin.notices.index')->with('success', 'お知らせを更新しました');
    }

    // 指定したIDブログの削除処理
    public function destroy($id)
    {
        // dd($id);
        $notice = Notice::findOrFail($id);
        $notice->delete();

        return to_route('admin.notices.index')->with('success', 'お知らせを削除しました');
    }
}
