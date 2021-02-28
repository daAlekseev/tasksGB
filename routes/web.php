<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\Admin\IndexController as Admin;

Route::get('/', function () {
    return view('index');
});

Route::name('news.')
    ->prefix('news')
    ->group(function(){
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::name('categories.')
            ->prefix('categories')
            ->group(function(){
                Route::get('/', [CategoryController::class, 'index'])->name('index');
                Route::get('/{id}', [CategoryController::class, 'categoryById'])->name('categoryById');
                Route::get('/{key}/{id}', [NewsController::class, 'getOneItem'])->name('item');
            });
    });

Route::name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/addition', [Admin::class, 'addNews'])->name('addition');
        Route::get('/test1', [Admin::class, 'test1'])->name('test1');
        Route::get('/test2', [Admin::class, 'test2'])->name('test2');
    });

Route::get('/about', function () {
    return view('about');
});

Auth::routes();




