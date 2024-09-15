<?php

use App\Http\Controllers\Cards\ListarCardsController;
use App\Http\Controllers\Cards\NovoCardController;
use App\Http\Controllers\Cards\StoreCardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('cards')->name('cards.')->group(function () {
    Route::get('/', ListarCardsController::class)->name('listar');
    Route::get('/novo', NovoCardController::class)->name('novo');
    Route::post('/create', StoreCardController::class)->name('store');
});