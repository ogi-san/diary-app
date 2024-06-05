<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiaryController;
use Illuminate\Support\Facades\Route;
use App\Models\Diary;

Route::get('/', function () {
    return view('welcome');
});

// トップページへのルート
Route::get('/diaryTop', function () {
    return view('diaryTop');
})->middleware(['auth', 'verified'])->name('diaryTop');

// 日記関連のルート
Route::middleware('auth')->group(function () {
    // Route::get('/listDiary',[DiaryController::class, 'displayDiary'])->name('listDiary');

    // Route::get('/createDiary', function () {
    //     return view('createDiary');
    // })->name('createDiary');

    // Route::get('/editDiary', function () {
    //     return view('editDiary');
    // })->name('editDiary');

    // //Route::post('/listDiary', [DiaryController::class, 'displayDiary'])->name('displayDiary');
    // Route::post('/createDiary', [DiaryController::class, 'operationDiary'])->name('createDiary.operationDiary');

    // 日記の一覧表示
    Route::get('/listDiary', [DiaryController::class, 'displayDiary'])->name('listDiary');

    // 日記の作成フォーム表示
    Route::get('/createDiary', [DiaryController::class, 'create'])->name('createDiary');

    // 日記の保存
    Route::post('/listDiary', [DiaryController::class, 'store'])->name('storeDiary');

    // 日記の編集フォーム表示
    Route::get('/editDiary/{diary}', [DiaryController::class, 'edit'])->name('editDiary');

    // 日記の更新
    Route::patch('/listDiary/{diary}', [DiaryController::class, 'update'])->name('updateDiary');

    // 日記の削除
    Route::delete('/listDiary/{id}', [DiaryController::class, 'destroy'])->name('destroyDiary');
});

// タグ関連のルート
Route::get('/createTag', function () {
    return view('createTag');
})->name('createTag');

Route::get('/editTag', function () {
    return view('editTag');
})->name('editTag');

// プロフィール関連のルート
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';