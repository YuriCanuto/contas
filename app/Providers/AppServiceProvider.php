<?php

namespace App\Providers;

use App\Repositories\CardRepository;
use App\Repositories\Contracts\ICardRepository;
use App\Repositories\Contracts\IParcelaRepository;
use App\Repositories\Contracts\ITransacaoRepository;
use App\Repositories\Contracts\IUserRepository;
use App\Repositories\ParcelaRepository;
use App\Repositories\TransacaoRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ICardRepository::class, CardRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IParcelaRepository::class, ParcelaRepository::class);
        $this->app->bind(ITransacaoRepository::class, TransacaoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
