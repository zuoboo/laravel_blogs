<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest('updated_at')->simplePaginate(10);
        return view('admin.users.index', compact('users'));
    }


    // ユーザー登録画面表示
    public function create()
    {
        return view('admin.users.create');
    }

    // ユーザー登録処理
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('users', 'public');
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return to_route('admin.users.index')->with('success', 'ユーザーを登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        // $menu = User::findOrFail($user);
        $updateData = $request->validated();

        // 画像を変更する場合
        if ($request->has('image')) {
            // 変更前の画像削除
            Storage::disk('public')->delete($user->image);
            // 変更後の画像をアップロード、保存パスを更新対象データにセット
            $updateData['image'] = $request->file('image')->store('menus', 'public');
        }
        $updateData['password'] = Hash::make($updateData['password']);

        $user->update($updateData);

        return to_route('admin.users.index')->with('success', 'メニューを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $user->delete();
        Storage::disk('public')->delete($user->image);

        return to_route('admin.users.index')->with('success', 'ユーザー情報を削除しました');
    }
}
