<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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
    ->group(function(){
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/category', AdminCategoryController::class);
        Route::get('/test1', [AdminIndexController::class, 'downloadNewsJSON'])->name('test1');
        Route::get('/test2', [AdminIndexController::class, 'downloadCategoryJSON'])->name('test2');
    });

Route::get('/about', function () {
    return view('about');
});

Auth::routes();




