<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('index');
});

Route::name('news.')
    ->prefix('news')
    ->group(function(){
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/item/{news}', [NewsController::class, 'getOneItem'])->name('item');
        Route::name('categories.')
            ->prefix('categories')
            ->group(function(){
                Route::get('/', [CategoryController::class, 'index'])->name('index');
                Route::get('/{slug}', [CategoryController::class, 'categoryBySlug'])->name('categoryBySlug');
            });
    });

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'isAdmin'])
    ->group(function(){
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/category', AdminCategoryController::class);
        Route::get('/test1', [AdminIndexController::class, 'downloadNewsJSON'])->name('test1');
        Route::get('/test2', [AdminIndexController::class, 'downloadCategoryJSON'])->name('test2');
        Route::match(['get', 'post'], '/profile', [AdminProfileController::class, 'index'])->name('profile');
        Route::get('/parser', [ParserController::class, 'index'])->name('parser');
    });

Route::get('auth/vk', [LoginController::class, 'vkLogin'])->name('vkLogin');
Route::get('auth/vk/response', [LoginController::class, 'vkResponse'])->name('vkResponse');
Route::get('auth/github', [LoginController::class, 'githubLogin'])->name('githubLogin');
Route::get('auth/github/response', [LoginController::class, 'githubResponse'])->name('githubResponse');

Route::middleware('auth')
    ->match(['get', 'post'], '/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/about', function () {
    return view('about');
});

Auth::routes();




