<?php

namespace App\Http\Controllers\Cards;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ICardRepository;

class EditarCardController extends Controller {

    public function __invoke(
        string $card_id,
        ICardRepository $cardRepository
    )
    { 
        return view('cards.editar', [
            'card' => $cardRepository->show($card_id)
        ]);
    }
}