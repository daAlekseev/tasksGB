<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\News\IndexController;

Route::get('/', function () {
    return view('index');
});

Route::name('news.')
    ->prefix('news')
    ->group(function(){
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::get('/categories', [IndexController::class, 'categories'])->name('categories');
        Route::get('/categories/{key}', [IndexController::class, 'categoryId'])->name('categoryId');
        Route::get('categories/{key}/{id}', [IndexController::class, 'getItem'])->name('item');
    });

Route::get('/about', function () {
    return view('about');
});
