<?php

namespace App\Http\Controllers\Contas;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ITransacaoRepository;

class ListarContasController extends Controller {

    public function __invoke(
        string $card_id,
        ITransacaoRepository $repository
    )
    {
        $transacoes = $repository->getTransacoes($card_id);

        return view('contas.index', [
            'card_id' => $card_id,
            'contas' => $transacoes
        ]);
    }

}