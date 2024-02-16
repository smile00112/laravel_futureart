<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\QrCodeController;
use App\Models\Album;
use App\Models\Foto;
use Illuminate\Support\Facades\Route;

//public function boot(): void
//{
//    Route::bind('album', function (string $value) {
//        dd($value);
//        return \App\Models\Album::where('slug', $value)->firstOrFail();
//    });
//
//    Route::bind('foto', function (string $value) {
//        return Foto::where('slug', $value)->firstOrFail();
//    });
//
//}

Route::get('/', function () {
    return redirect('/admin');

   // return view('home');
})->name('home');

Route::get('/qr-code/{album:slug}/{foto:slug}', [QrCodeController::class, 'show']);



//Route::controller(ArticleController::class)
//    ->name('articles.')
//    ->prefix('articles')->group(function () {
//
//        Route::get('/', 'index')->name('index');
//        Route::get('/{article:slug}', 'show')->name('show');
//});
//
//Route::controller(DictionaryController::class)
//    ->name('dictionaries.')
//    ->prefix('dictionaries')->group(function () {
//
//        Route::get('/', 'index')->name('index');
//        Route::get('/{dictionary:slug}', 'show')->name('show');
//    });
