<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('posts/{id}', [PostsController::class, 'show'])->name('posts.show');

Route::prefix('admin')->group(function () {
    #後台表單
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');

    #列出所有文章表單
    Route::get('posts', [AdminPostsController::class, 'index'])->name('admin.posts.index');
    #新增文章表單
    Route::get('posts/create', [AdminPostsController::class, 'create'])->name('admin.posts.create');
    #修改文章表單
    Route::get('posts/{id}/edit', [AdminPostsController::class, 'edit'])->name('admin.posts.edit');

    #儲存新增文章
    Route::post('posts',[AdminPostsController::class, 'store'])->name('admin.posts.store');
    #更新文章
    Route::patch('posts/{id}',[AdminPostsController::class, 'update'])->name('admin.posts.update');
    #刪除文章
    Route::delete('posts/{id}',[AdminPostsController::class, 'destroy'])->name('admin.posts.destroy');
});
