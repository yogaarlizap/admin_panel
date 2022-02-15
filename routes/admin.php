<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;


Route::name('admin/')->group(static function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::prefix('categories')->name('categories/')->group(static function () {
        // Route::get('kategori/data', 'KategoriController@listData')->name('data');
        Route::resource('/', CategoryController::class);
    });

    Route::get('tes1', function () {
        return view('admin.treeview.tes1');
    })->name('tes1');

    Route::get('tes2', function () {
        return view('admin.treeview.tes2');
    })->name('tes2');
});
