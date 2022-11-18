<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMenuRequest;
use App\Http\Requests\Admin\UpdateMenuRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Menu;

class AdminMenuController extends Controller
{
    // メニュー一覧画面
    public function index()
    {
        $menus = Menu::latest('updated_at')->simplePaginate(10);
        return view('admin.menus.index', ['menus' => $menus]);
    }

    // メニュー登録画面
    public function create()
    {
        return view('admin.menus.create');
    }

    // メニュー保存処理
    public function store(StoreMenuRequest $request)
    {
        // dd($request);

        $savedImagePath = $request->file('image')->store('menus', 'public');
        $menu = new Menu($request->validated());
        $menu->image = $savedImagePath;
        $menu->save();

        return to_route('admin.menus.index')->with('success', 'メニューを登録しました');
    }

    // 指定したIDのメニューの編集画面
    public function edit(Menu $menu)
    {

        // dd($menu);
        // $menu = Menu::all();
        return view('admin.menus.edit', compact('menu'));
    }


    // 指定したIDのメニューの編集画面
    public function update(UpdateMenuRequest $request, $id)
    {

        $menu = Menu::findOrFail($id);
        $updateData = $request->validated();

        // 画像を変更する場合
        if ($request->has('image')) {
            // 変更前の画像削除
            Storage::disk('public')->delete($menu->image);
            // 変更後の画像をアップロード、保存パスを更新対象データにセット
            $updateData['image'] = $request->file('image')->store('menus', 'public');
        }
        // $blog->category()->associate($updateData['category_id']);
        // $blog->cats()->sync($updateData['cats']);
        $menu->update($updateData);

        return to_route('admin.menus.index')->with('success', 'メニューを更新しました');
    }

        // 指定したIDメニューの削除処理
        public function destroy($id)
        {
            // dd($id);
            $blog = Menu::findOrFail($id);
            $blog->delete();
            Storage::disk('public')->delete($blog->image);

            return to_route('admin.menus.index')->with('success', 'ブログを削除しました');
        }
}
