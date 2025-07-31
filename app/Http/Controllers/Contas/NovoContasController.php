<?php

namespace App\Http\Controllers\Contas;

use App\Http\Controllers\Controller;

class NovoContasController extends Controller {

    public function __invoke(
        string $card_id
    )
    { 
        return view('contas.create', [
            'card_id' => $card_id,
        ]);
    }

}