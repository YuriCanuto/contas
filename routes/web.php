<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Cards\DeleteCardController;
use App\Http\Controllers\Cards\EditarCardController;
use App\Http\Controllers\Cards\ListarCardsController;
use App\Http\Controllers\Cards\NovoCardController;
use App\Http\Controllers\Cards\StoreCardController;
use App\Http\Controllers\Cards\UpdateCardController;
use App\Http\Controllers\Contas\ListarContasController;
use App\Http\Controllers\Contas\NovoContasController;
use App\Http\Controllers\Contas\StoreContasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('cards')->name('cards.')->group(function () {
        Route::get('/', ListarCardsController::class)->name('listar');
        Route::get('/novo', NovoCardController::class)->name('novo');
        Route::post('/', StoreCardController::class)->name('store');
        Route::get('/{card_id}', EditarCardController::class)->name('editar');
        Route::put('/{card_id}', UpdateCardController::class)->name('update');
        Route::delete('/{card_id}', DeleteCardController::class)->name('delete');

        Route::prefix('{card_id}/contas')->name('contas.')->group(function () {
            Route::get('/', ListarContasController::class)->name('listar');
            Route::get('/novo', NovoContasController::class)->name('novo');
            Route::post('/', StoreContasController::class)->name('store');
        });
    });
});

Auth::routes();