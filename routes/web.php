<?php

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use Database\Seeders\BlogSeeder2;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
// ホーム画面
Route::get('/', [BlogController::class, 'top'])->name('index');

// ブログ一覧画面
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');

// お問い合わせフォーム
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendMail']);
Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contact.complete');

// 管理画面
Route::prefix('/admin')
    ->name('admin.')
    ->group(function () {
        // ログイン時のみアクセス可能なルート
        Route::middleware('auth')
            ->group(function () {
                // ブログ
                // Route::get('/blogs', [AdminBlogController::class, 'index'])->name('blogs.index');
                // Route::get('/blogs/create', [AdminBlogController::class, 'create'])->name('blogs.create');
                // Route::post('/blogs', [AdminBlogController::class, 'store'])->name('blogs.store');
                // Route::get('/blogs/{blog}', [AdminBlogController::class, 'edit'])->name('blogs.edit');
                // Route::put('/blogs/{blog}', [AdminBlogController::class, 'update'])->name('blogs.update');
                // Route::delete('/blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('blogs.destroy');
                Route::resource('/blogs', AdminBlogController::class)->except('show');
                Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

                // ユーザー管理
                Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
                Route::post('/users', [UserController::class, 'store'])->name('users.store');
            });

        // 未ログイン時にのみアクセス可能なルート
        Route::middleware('guest')
            ->group(function () {
                // 認証
                Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
                Route::post('/login', [AuthController::class, 'login']);
            });
    });
