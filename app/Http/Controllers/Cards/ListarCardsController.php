<?php

namespace App\Http\Controllers\Cards;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ICardRepository;
use Illuminate\Support\Facades\Auth;

class ListarCardsController extends Controller {

    public function __invoke(
        ICardRepository $cardRepository
    )
    { 
        $cards = $cardRepository->list(Auth::user()->id, []);

        return view('cards.index', [
            'cards' => $cards
        ]);
    }

}