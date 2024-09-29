<?php

use App\Http\Controllers\Cards\DeleteCardController;
use App\Http\Controllers\Cards\EditarCardController;
use App\Http\Controllers\Cards\ListarCardsController;
use App\Http\Controllers\Cards\NovoCardController;
use App\Http\Controllers\Cards\StoreCardController;
use App\Http\Controllers\Cards\UpdateCardController;
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
    Route::get('/editar/{card_id}', EditarCardController::class)->name('editar');
    Route::put('/update/{card_id}', UpdateCardController::class)->name('update');
    Route::delete('/delete/{card_id}', DeleteCardController::class)->name('delete');
});