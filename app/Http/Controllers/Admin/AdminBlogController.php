<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminBlogController extends Controller
{
    // ブログ一覧画面
    public function index()
    {

        $blogs = Blog::latest('updated_at')->simplePaginate(10);
        return view('admin.blogs.index', ['blogs' => $blogs,]);
    }

    // ブログ投稿画面
    public function create()
    {
        // $users = User::select('id')->get();
        $user = Auth::user();
        $categories = Category::select('id', 'name')->get();
        // $menus = Menu::select('id', 'name')->get();
        $menus = Menu::all();
        // dd($menus);
        return view('admin.blogs.create', compact('categories', 'menus', 'user'));
    }

    // ブログ投稿処理
    public function store(StoreBlogRequest $request)
    {
        // dd($request);

        $savedImagePath = $request->file('image')->store('blogs', 'public');
        $blog = new Blog($request->validated());
        $blog->image = $savedImagePath;
        $blog->category_id = $request->category_id;
        $blog->user_id = $request->user_id;
        $blog->save();
        $blog->menus()->sync($request->menus);
        // $blog->save();

        return to_route('admin.blogs.index')->with('success', 'ブログを投稿しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    // 指定したIDのブログの編集画面
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        $menus = Menu::all();
        return view('admin.blogs.edit', ['blog' => $blog, 'categories' => $categories, 'menus' => $menus]);
    }


    // 指定したIDのブログの編集画面
    public function update(UpdateBlogRequest $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $updateData = $request->validated();
        // dd($updateData);

        // 画像を変更する場合
        if($request->has('image')) {
            // 変更前の画像削除
            Storage::disk('public')->delete($blog->image);
            // 変更後の画像をアップロード、保存パスを更新対象データにセット
            $updateData['image'] = $request->file('image')->store('blogs', 'public');
        }
        $blog->category()->associate($updateData['category_id']);
        $blog->menus()->sync($updateData['menus']);
        $blog->update($updateData);

        return to_route('admin.blogs.index')->with('success', 'ブログを更新しました');





    }


    // 指定したIDブログの削除処理
    public function destroy($id)
    {
        // dd($id);
        $blog = Blog::findOrFail($id);
        $blog->delete();
        Storage::disk('public')->delete($blog->image);

        return to_route('admin.blogs.index')->with('success', 'ブログを削除しました');
    }
}
