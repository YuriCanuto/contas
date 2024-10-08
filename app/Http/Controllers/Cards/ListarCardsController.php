<?php

namespace App\Http\Controllers\Cards;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ICardRepository;

class ListarCardsController extends Controller {

    public function __invoke(
        ICardRepository $cardRepository
    )
    { 
        $cards = $cardRepository->list([]);

        return view('cards.index', [
            'cards' => $cards
        ]);
    }

}