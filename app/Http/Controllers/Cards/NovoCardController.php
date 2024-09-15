<?php

namespace App\Http\Controllers\Cards;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ICardRepository;
use Illuminate\Support\Facades\Auth;

class NovoCardController extends Controller {

    public function __invoke(
        ICardRepository $cardRepository
    )
    { 
        return view('cards.create');
    }

}