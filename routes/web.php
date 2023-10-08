<?php

use App\Http\Controllers\TweetController; // 追記
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('top'); // welcome から top に変更
});

// グループで囲み、その中にエンドポイントを作成dayo
Route::group(['middleware' => ['auth']], function () {
    Route::get('/tweets', [TweetController::class, 'index'])->name('tweets.index');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
    Route::get('/tweets/{tweet}/edit', [TweetController::class, 'edit'])->name('tweets.edit');//追記した
    Route::put('/tweets/{tweet}', [TweetController::class, 'update'])->name('tweets.update');
    Route::delete('/tweets/{tweet}', [TweetController::class, 'destroy'])->name('tweets.destroy');
});

require __DIR__.'/auth.php';