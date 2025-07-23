<?php

namespace App\Http\Controllers\Cards;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ICardRepository;

class NovoCardController extends Controller {

    public function __invoke()
    { 
        return view('cards.create');
    }

}