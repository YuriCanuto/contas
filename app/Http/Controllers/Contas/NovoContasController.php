<?php

namespace App\Http\Controllers\Contas;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\IUserRepository;

class NovoContasController extends Controller
{
    public function __invoke(
        string $card_id,
        IUserRepository $repository
    ) {
        return view('contas.create', [
            'usuarios' => $repository->getUsuarios(),
            'card_id' => $card_id,
        ]);
    }
}
